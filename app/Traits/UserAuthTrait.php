<?php

namespace App\Traits;

use JWTAuth;
use GraphQL;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

trait UserAuthTrait
{
    /**
        ** Get User from access token.
    **/
    public function getAuthUser() {
        try {
            $token = $this->getBearerToken();
            if (!$user = JWTAuth::toUser($token)) {
                return [
                    'error' => 'Not Authorized!',
                    'statusCode' => (int)401
                ];
            } else {
                return [
                    'statusCode' => (int)200,
                    'user' => JWTAuth::toUser($token)
                ];
            }
        } catch (TokenExpiredException $e) {
            return [
                'error' => 'Token Expired!',
                'statusCode' => (int)401
            ];
        } catch (TokenInvalidException $e) {
            return [
                'error' => 'Not Authorized!',
                'statusCode' => (int)401
            ];
        } catch (JWTException $e) {
            return [
                'error' => 'Not Authorized!',
                'statusCode' => (int)401
            ];
        } catch (Exception $e) {
            return [
                'error' => 'Not Authorized!',
                'statusCode' => (int)401
            ];
        }
    }

    /**
        ** Get access token from header
    **/
    public function getBearerToken() {
        $headers = $this->getAuthorizationHeader();

        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Token\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    /**
        ** Get header Authorization
    * */
    public function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));

            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
}
