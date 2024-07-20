<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToyController extends Controller
{
    public function index() {
        $user = Auth::user();

        if($user->role !== "admin") {
            return redirect()->route('login')->with('status', 'Tidak dapat mengakses halaman tersebut!');
        }

        $toys = Toy::all();
        $categories = Category::all();
        return view('admin.menu.table', compact(['toys', 'categories', 'user']));
    }

    public function create() {
        $categories = Category::all();
        $user = Auth::user();
        return view('admin.menu.add', compact('categories', 'user'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' =>  'required'
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'image.required' => 'Gambar Harap diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'price.required' => 'Harga Harap diisi',
            'price.integer' => 'Harga merupakan angka',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Toy::create([
            "category_id" =>$request->input('category_id'),
            "image" => $imgName,
            "name" =>$request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            "description" =>$request->input('description'),
        ]);

        return redirect()->route('admin_table')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(Toy $toy) {
        $count = Toy::count();

        if($count <= 4) {
            return redirect()->route('admin_table')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 4 data!');
        }

        $oldImage = public_path('img/' . $toy->image);
        unlink($oldImage);

        $toy->delete();
        return redirect()->route('admin_table')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(Toy $toy) {
        $categories = Category::all();
        $user = Auth::user();
        return view('admin.menu.edit', compact(['categories', 'toy', 'user']));
    }

    public function update(Request $request, Toy $toy) {

        $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' =>  'required'
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'price.required' => 'Harga Harap diisi',
            'price.integer' => 'Harga merupakan angka',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            $oldImage = public_path('img/' . $toy->image);
            unlink($oldImage);
        }
        else {
            $imgName = $toy->image;
        }

        $toy->update([
            "image" => $imgName,
            "category_id" =>$request->input('category_id'),
            "name" =>$request->input('name'),
            "stock" =>$request->input('stock'),
            "description" =>$request->input('description'),
            "price" =>$request->input('price'),
        ]);

        $toy->save();
        return redirect()->route('admin_table')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function category (Category $category) {
        $categories = Category::all();
        $search = $category->name;
        $user = Auth::user();

        $toys = Toy::whereHas('category', function($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->get();

        return view('admin.menu.table', compact('toys', 'categories', 'user'));
    }

    public function search(Request $request) {
        $categories = Category::all();
        $search = $request->input('search');
        $user = Auth::user();

        $toys = Toy::where(function($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->get();

        return view('admin.menu.table', compact('toys', 'categories', 'user'));
    }
}
