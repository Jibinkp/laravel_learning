<?php

namespace App\Http\Controllers;

use App\Models\loginModel;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function userRegister(Request $request)
    {
        $registerData = loginModel::create($request->all());
        return response()->json($registerData, 200);
    }

    public function login(Request $request)
    {
        $loginData = loginModel::where('user_email', $request->user_email)
            ->where('user_password', $request->user_password)
            ->get();
        $res = null;
        if ($loginData != null) {
            $res['data'] = $loginData;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "Login Successful";
            return response()->json($res);
        } else {
            $res['data'] = $loginData;
            $res['errorCode'] = 404;
            $res['errorMessage'] = "Login faild";
            return response()->json($res);
        }
    }
}
