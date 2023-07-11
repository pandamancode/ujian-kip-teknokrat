<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'no_telepon'  => ['required', 'string','min:7', 'max:15', 'unique:users'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    
        $customMessages = [
            'name.required' => 'Masukan Nama Lengkap',
            'no_telepon.min' => 'No Telepon Minimal 7 Karakter',
            'no_telepon.max' => 'No Telepon Maksimal 15 Karakter',
            'no_telepon.required' => 'Masukan No Telepon/WA',
            'no_telepon.unique' => 'No Telepon/WA Sudah Terdaftar',
            'password.required' => 'Masukan Password',
            'password.confirmed' => 'Password dan Confirm Password Tidak Sama',
        ];
    
        $this->validate($request, $rules, $customMessages);


        $user = User::create([
            'name' => strip_tags($request->name),
            'no_telepon' => strip_tags($request->no_telepon),
            'email' => strip_tags($request->no_telepon).'@teknokrat.ac.id',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
