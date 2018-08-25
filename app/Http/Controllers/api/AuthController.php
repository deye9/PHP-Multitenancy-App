<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use JWTFactory;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\RegisterFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    protected $tag = 'Authentication Controller';

    public function register(RegisterFormRequest $request)
    {
        User::create([
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);
    }

    public function forgotpassword(Request $request)
    {
        try
        {
            $this->sendResetLinkEmail($request);
        } catch (Exception $e) {
            return $this->error($this::ERROR_RESETTING_USER_PASSWORD);
        }
    }

    public function resetpassword(Request $request)
    {
        try
        {
            // Validate the request.
            $input = $request->all();
            $validator = $this->passwordReset($input);

            if ($validator->fails())
            {
                return $this->jsonResponse([
                    'status' => "Error",
                    'message' => 'Payload Validation failed.',
                    'data' => json_encode($validator->failed())
                ], $this::BAD_REQUEST);
            }

            // Get the user from the DB.
            $user = User::where('email', $request->input('email')) -> first();

            // Has the password, set the Remember Token and save the user data.
            $user->password = Hash::make($request->input('password'));
            $user->setRememberToken(Str::random(60));

            $user->save();
        } catch (Exception $e) {
            return $this->error($this::ERROR_RESETTING_USER_PASSWORD);
        }
    }

    public function signin(Request $request)
    {
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
            ]);
        } catch (JWTException $e) {
            return $this->error($e, $this::USER_LOGIN_ERROR);
        }

        if (!$token) {
            return response()->json([
                'Credentials' => $this::USER_LOGIN_ERROR
            ]);
        } else {
            $data = [];
            $meta = [];

            $user = User::find($request->user()->id);
            $roles = $user->getRoleNames();
            //request->input('email');

            $meta['token'] = $token;
            $data['name'] = $request->user()->name;
            // $data['permissions'] = gettype($user->getAllPermissions());

            return response()->json([
                'meta' => $meta,
                'access' => $data
            ]);
        }
    }
}
