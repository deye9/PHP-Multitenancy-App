<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['name'] = $request->user()->name;
        $data['email'] = $request->user()->email;
        $data['permissions'] = 'Dashboard, Profile';
        return response()->json([
            'data' => $data,
        ]);
    }
}
