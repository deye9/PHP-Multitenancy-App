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

    // public function __construct() {
    //     // $this->middleware('jwt.auth', ['except' => ['signin']]);
    //     \Log::info(1);
    // }

    // public function register(RegisterFormRequest $request)
    // {
    //     User::create([
    //         'name' => $request->json('name'),
    //         'email' => $request->json('email'),
    //         'password' => bcrypt($request->json('password')),
    //     ]);
    // }

    public function signin(Request $request)
    {
        \Log::info(2);
        \Log::info($request->only('email', 'password'));

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));

        // try {
        //     $token = JWTAuth::attempt($request->only('email', 'password'), [
        //         'exp' => Carbon::now()->addWeek()->timestamp,
        //     ]);
        // } catch (JWTException $e) {
        //     return response()->json([
        //         'error' => 'Could not authenticate',
        //     ], 500);
        // }

        // if (!$token) {
        //     return response()->json([
        //         'error' => 'Could not authenticate',
        //     ], 401);
        // } else {
        //     $data = [];
        //     $meta = [];

        //     $data['name'] = $request->user()->name;
        //     $meta['token'] = $token;

        //     return response()->json([
        //         'data' => $data,
        //         'meta' => $meta
        //     ]);
        // }
    }
}
