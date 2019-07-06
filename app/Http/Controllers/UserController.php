<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function LoginUser(Request $req){
        return User::find($req->email, $req->password);
    }

    public function RegisterUser(Request $req){
        return response()->json($req, 201);
    }

    public function GetDetailUser(Request $req){
        return User::find($req);
    }
}
