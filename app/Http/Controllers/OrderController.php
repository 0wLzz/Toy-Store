<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function order(Request $request, Toy $toy) {
        $cart = session()->get('cart', []);

        if (isset($cart[$toy->id])) {
            $total = $cart[$toy->id]['quantity'] + $request->input('quantity');

            if($total > $toy->stock){
                return redirect()->route('login')->with('status', "Maaf namun stock tidak mencukupi");
            }
            $cart[$toy->id]["quantity"] = $total;
        }
        else {

            if($request->input('quantity') > $toy->stock){
                return redirect()->route('login')->with('status', "Maaf namun stock tidak mencukupi");
            }

            $cart[$toy->id] = [
                "id" => $toy->id,
                "name" => $toy->name,
                "image" => $toy->image,
                "category" => $toy->category->name,
                "price" => $toy->price,
                "quantity" => $request->input('quantity')
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('login')->with('status', 'Added to Cart!');
    }

    public function buy(Toy $toy) {
        $user = Auth::user();

        if ($toy->price > $user->money) {
            return redirect()->route('login')->with('status', 'Not enough Money!');
        }

        $uniqueInvoiceId = sprintf('%08d', random_int(10000000, 99999999));
        $user->money -= $toy->price;
        $user->save();

        $invoice = Invoice::create([
            "id" => $uniqueInvoiceId,
            "user_id" => $user->id,
            "total_price" => $toy->price,
        ]);

        InvoiceDetail::create([
            "invoice_header_id" => $uniqueInvoiceId,
            "toy_id" => $toy->id,
            "quantity" => 1,
            "subTotal" => $toy->price
        ]);

        $toy->stock -= 1;
        $toy->save();

        return redirect()->route('login')->with('status', 'Successful!');
    }

    public function category (Category $category) {
        $user = Auth::user();
        $categories = Category::all();
        $newestToys = Toy::orderBy('created_at', 'desc')->take(6)->get();
        $cart = session()->get('cart', []);
        $invoices = Invoice::with('invoiceDetails.toy')->where('user_id', $user->id)->get();

        $search = $category->name;
        $toys = Toy::whereHas('category', function($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->get();

        return view('index', compact('toys', 'categories', 'newestToys', 'cart', 'invoices'));
    }

    public function checkout($total)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);

        if ($total > $user->money) {
            return redirect()->route('login')->with('status', 'Not enough Money!');
        }

        $uniqueInvoiceId = sprintf('%08d', random_int(10000000, 99999999));

        $user->money -= $total;
        $user->save();

        $invoice = Invoice::create([
            "id" => $uniqueInvoiceId,
            "user_id" => $user->id,
            "total_price" => $total,
        ]);

        foreach ($cart as $item) {
            InvoiceDetail::create([
                "invoice_header_id" => $uniqueInvoiceId,
                "toy_id" => $item["id"],
                "quantity" => $item['quantity'],
                "subTotal" => $item["quantity"] * $item["price"]
            ]);

            $toy = Toy::find($item["id"]);
            if ($toy) {
                $toy->stock -= $item['quantity'];
                $toy->save();
            }
        }

        session()->forget("cart");
        return redirect()->route('login')->with('status', 'Successful!');
    }

    public function delete_from_cart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('status', 'Item removed from cart');
    }

}
