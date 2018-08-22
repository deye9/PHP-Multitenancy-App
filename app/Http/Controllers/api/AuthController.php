<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use Validator;
use JWTFactory;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    protected $tag = 'Authentication Controller';

    public function register(RegisterFormRequest $request)
    {
        User::create([
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);
    }

    public function signin(Request $request)
    {
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 401);
        } else {
            $data = [];
            $meta = [];
            $permissions = [];

            $data['name'] = $request->user()->name;
            $meta['token'] = $token;
            $permissions['menu'] = 'Dashboard, Profile';
            return response()->json([
                'data' => $data,
                'meta' => $meta,
                'permissions' => $permissions
            ]);
        }
    }
}
