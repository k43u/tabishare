<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function delete()
    {
        return view('users.delete');
    }
    
    public function destroy()
    {
        
    }
}