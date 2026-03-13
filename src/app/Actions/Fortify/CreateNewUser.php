<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateNewUser
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','confirmed','min:8'],
        ])->validate();

        return User::create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
        ]);
    }
}