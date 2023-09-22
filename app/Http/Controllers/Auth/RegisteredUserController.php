<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255', 'unique:' . User::class
            ],
            'password' => [
                'required', 'confirmed', Rules\Password::defaults()
            ],
            'phone' => ['required', 'string', 'max:20'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'tos' => ['required', 'accepted'],
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'name.string' => 'Kolom nama harus berupa teks',
            'name.max' => 'Kolom nama maksimal 255 karakter',

            'email.required' => 'Kolom email harus diisi',
            'email.string' => 'Kolom email harus berupa teks',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Kolom email maksimal 255 karakter',
            'email.unique' => 'Email sudah digunakan',


            'password.required' => 'Kolom password harus diisi',
            'password.required' => 'Kolom password harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',

            'phone.required' => 'Kolom nomor telepon harus diisi',
            'phone.string' => 'Kolom nomor telepon harus berupa teks',
            'phone.max' => 'Kolom nomor telepon maksimal 20 karakter',

            'birthdate.required' => 'Kolom tanggal lahir harus diisi',
            'birthdate.date' => 'Format tanggal lahir tidak valid',

            'address.required' => 'Kolom alamat harus diisi',
            'address.string' => 'Kolom alamat harus berupa teks',
            'address.max' => 'Kolom alamat maksimal 255 karakter',

            'tos.required' => 'Anda harus menerima Syarat dan Ketentuan',
            'tos.accepted' => 'Anda harus menerima Syarat dan Ketentuan',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->profile()->create([
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
        ]);

        $user->assignRole('Member');

        event(new Registered($user));

        $session_id = session()->getId();

        // Cari cart dengan session_id yang sesuai
        $carts = Cart::where('session_id', $session_id)->get();

        if ($carts->count() > 0) {
            foreach ($carts as $cart) {
                $cart->update(['user_id' => $user->id]);
            }

            Auth::login($user);
            return redirect()->route('cart');
        } else {
            Auth::login($user);
            return redirect()->route('home');
        }
    }
}
