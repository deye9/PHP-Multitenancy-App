<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use JWTFactory;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserPermissions;
//use Illuminate\Support\Facades\DB;
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

    public function getpermissions($token) {
        try {
            $data = [];
            $meta = [];
            $meta['token'] = $token;

            if (!$user = JWTAuth::toUser($token)) {
                return response()->json(['code' => 404, 'message' => 'user_not_found']);
            } else {
                $user = JWTAuth::toUser($token);

                // Get user alongside all user permissions.
                $user = User::find($user->id);
                $permissons = $user->getAllPermissions();

                // Check if the user is an Admin and if all Admin data is good to go.
                $data['user'] = $user;
                $meta['IsAdmin'] = $user->hasRole('admin');
                $meta['IsProfileValid'] = \App\Models\Metadata::IsProfileValid();

                // // Unset all un-needed properties.
                // unset($user->id);
                // unset($user->created_at);
                // unset($user->updated_at);
                // unset($user->permissions);

                // foreach ($user->roles as $role) {
                //     unset($role->pivot);
                //     unset($role->created_at);
                //     unset($role->updated_at);
                //     unset($role->guard_name);
                // }

                // foreach ($permissons as $obj) {
                //     unset($obj->pivot);
                //     unset($obj->guard_name);
                //     unset($obj->created_at);
                //     unset($obj->updated_at);
                // }

                //$data['Menu'] = UserPermissions::getFixes();
                return response()->json(['code' => 200, 'data' => $data, 'meta' => $meta]);
            }
        } catch (Exception $e) {
            return response()->json(['code' => 404, 'message' => 'Something went wrong']);
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
            return $this->getpermissions($token);
        }
    }

    public function vettoken(Request $request)
    {
        return $this->getpermissions($request->all());
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

    public function forgotpassword(Request $request)
    {
        try
        {
            $this->sendResetLinkEmail($request);
        } catch (Exception $e) {
            return $this->error($this::ERROR_RESETTING_USER_PASSWORD);
        }
    }

    public function register(RegisterFormRequest $request)
    {
        User::create([
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);
    }
}
