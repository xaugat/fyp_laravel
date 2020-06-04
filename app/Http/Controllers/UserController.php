<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user(Request $var) // this function will return details of user with the role
    {
        $u = User::where("remember_token", $var->api_token)->first();
        $r =  Role::where("id", $u->roles_id)->first();
        $u['role'] = $r->name;
        return $u;
    }
}
