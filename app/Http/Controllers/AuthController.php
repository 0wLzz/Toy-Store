<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Toy;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function homepage()
    {
        $user = Auth::user();

        $toys = Toy::all();
        $categories = Category::all();
        $newestToys = Toy::orderBy('created_at', 'desc')->take(6)->get();
        $cart = session()->get('cart', []);

        if($user) {
            $invoices = Invoice::with('invoiceDetails.toy')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
            return view('index', compact('newestToys', 'toys', 'cart', 'categories', 'invoices'));
        }

        return view('index', compact('newestToys', 'toys', 'cart', 'categories'));
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|email',
            'password' => 'required'
        ], [
            'username.required' => 'Email harap diisi',
            'username.email' => 'Harap diisi email yang valid',
            'password.re{{  }}ed' => 'Password harap diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator, 'login')
                            ->withInput()
                            ->with('status', 'Invalid Credentials!');
        }

        $user = User::where('email', $request->input('username'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {

            Auth::login($user);
            if($user->role === 'admin') {
                return redirect()->route('admin_table')->with('success', 'Logged In successful!');
            }

            if ($request->input('remember')) {
                setcookie("username", $request->input('username'), time()+3600);
                setcookie("password", $request->input('password'), time()+3600);
            }
            else {
                setcookie("username", "");
                setcookie("password", "");
            }


            return redirect()->route('login')->with('status', 'Logged In successful!');
        }

        return redirect()->route('login')->with('status', 'Invalid Credentials!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been logged out!');
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'firstName.required' => 'Nama Harap Diisi',
            'firstName.string' => 'Nama Harap berupa huruf',
            'firstName.max' => 'Nama tidak boleh melebihi 255 karakter',

            'lastName.required' => 'Nama Harap Diisi',
            'lastName.string' => 'Nama Harap berupa huruf',
            'lastName.max' => 'Nama tidak boleh melebihi 255 karakter',

            'email.required' => 'Email harap diisi',
            'email.string' => 'Email harap berupa huruf',
            'email.email' => 'Harap masukan email yang valid',
            'email.max' => 'Email tidak boleh melebihi 255 karakter',
            'email.unique' => 'Email tersebut sudah ada',

            'password.required' => 'Password harap diisi',
            'password.string' => 'Password harap berupa huruf',
            'password.min' => 'Password minimal 8 huruf',
            'password.confirmed' => 'Password harap ditulis kembali',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator, 'register')
                            ->withInput()
                            ->with('status', 'Invalid Credentials!');
        }

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'money' => 0,
        ]);

        Auth::login($user);

        return redirect()->back()->with('status', 'Registration successful!');
    }

    public function topUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|string',
            'customAmount' => 'nullable|integer|min:1|max:2147483647',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('status', 'Invalid Credentials!');
        }

        $amount = $request->amount === 'custom' ? $request->customAmount : (int)$request->amount;

        if ($amount <= 0) {
            return back()->withErrors(['customAmount' => 'Invalid amount entered.']);
        }

        $user = Auth::user();
        $user->money += $amount;
        $user->save();

        return redirect()->back()->with('status', 'Balance topped up successfully!');
    }

}
