<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::id());

        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password-confirm');

        $user->email = $email;


        // Gestion de la modification de mot de passe si l'utilisateur souhaite le modifier
        if (!empty($password && $passwordConfirm)) {
            // Je vérifie que le mot de passe coincide avec la confirmation de mot de passe
            if ($password == $passwordConfirm) {
                // Hashing password
                $user->password = Hash::make($password);
                $user->save();
                return back()->with('success', 'Votre profil a bien été modifié');
            } else {
                return back()->with('password', 'Vos mot de passes ne sont pas identiques, veuillez réessayer');
            }
        }

        // Gestion de la modification de l'avatar
        if (!empty($request->file('avatar'))) {
           $validator = Validator::make($request->all(), [
               'avatar' => 'mimes:png,jpg,svg',
           ], [
               'avatar.mimes' => 'Veuillez uploader uniquement des fichiers "SVG", "PNG" ou "JPEG"'
           ]);

           if ($validator->fails()) {
               return back()->withErrors($validator);
           }

           $avatar = $request->file('avatar');

           // Je remplace l'ancien par le nouveau

            Storage::disk('public')->delete($user->avatar_path);

            $path = Storage::disk('public')->put('images', $avatar);

            // Je modife le path dans la base de données

            $user->avatar_path = $path;

            $user->save();

            return back()->with('success', 'Votre profil a bien été modifié');





        }

        $user->save();
        return back()->with('success', 'Votre profil a bien été modifié');

    }
}
