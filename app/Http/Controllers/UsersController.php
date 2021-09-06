<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
//   public function edit($id)
//     {
//         $user = User::findOrFail($id);

//         return view('users.usersedit', [
//             'user' => $user,
//         ]);
//     }
    
    public function edit()
    {
        $user = \Auth::user();

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
  public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->$request->user;
        $user->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $trip = \App\User::findOrFail($id);

        if (\Auth::id() === $user->user_id) {
            $user->delete();
        }

        return redirect('/');
    }
    
}