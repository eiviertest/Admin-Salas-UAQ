<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Persona;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
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
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomPer' => 'required|string|max:200',
            'apePatPer' => 'required|string|max:200',
            'apeMatPer' => 'string|max:200',
            'telPer' => 'int|max:10' 
        ]);

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($user));
            //Datos Persona
            $persona = new Persona();
            $persona->nomPer = $request->nomPer;
            $persona->apePatPer = $request->apePatPer;
            $persona->apeMatPer = $request->apeMatPer;
            $persona->telPer = $request->telPer;
            $persona->idArea = $request->idArea;
            $persona->idUsr = $user->id;
            $persona->save();
        } catch (exception $e) {
            return $e->getMessage();
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
