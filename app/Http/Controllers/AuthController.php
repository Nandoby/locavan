<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        // Si la connexion se passe mal on revient en arrière avec une erreur et le champ email pré-rempli
        return back()->with([
            'error' => 'Votre adresse e-mail et/ou votre mot de passe sont incorrects'
        ])->onlyInput('email');
    }

    /**
     * Permet de se déconnecter
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50|alpha',
            'last_name' => 'required|max:150|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'avatar_path' => 'mimes:jpg,png,svg'
        ], [
            'first_name.required' => 'Veuillez entrer votre Prénom',
            'first_name.alpha' => 'Veuillez entrer uniquement des lettres',
            'first_name.max' => 'Veuillez entrer maximum 50 caractères',
            'last_name.required' => 'Veuillez entrer votre Nom',
            'last_name.alpha' => 'Veuillez entrer uniquement des lettres',
            'last_name.max' => 'Veuillez entrer maximum 150 caractères',
            'email.required' => 'Veuillez entrer une adresse e-mail',
            'email.email' => 'Veuillez entrer une adresse e-mail valide',
            'email.unique' => 'Cette adresse e-mail est déjà existante',
            'password.required' => 'Veuillez entrer un mot de passe',
            'avatar_path.mimes' => "L'extension du fichier doit être de type JPG, PNG ou SVG",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Si les données sont valides on applique un hash sur le password et on sauvegarde dans la base de données les
        // informations


        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('avatar_path')) {
            $path = $request->file('avatar_path')->store('images', 'public');
            $user->avatar_path = $path;
        }

        $user->save();

        return redirect()->route('auth.login')->with('register', 'Votre inscription a bien été prise en compte');

    }


}
