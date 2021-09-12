<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
   
    public function destroy($id)
    {
        $trip = \App\User::findOrFail($id);

        if (\Auth::id() === $user->user_id) {
            $user->delete();
        }

        return redirect('/');
    }
    
}