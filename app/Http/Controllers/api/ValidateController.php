<?php

namespace App\Http\Controllers\api;

use App\Models\Tenant;
use App\HttpStatusCode;
use App\ResponseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\TenantCreated;
use App\Http\Validations\AuthValidation;

class ValidateController extends Controller
{
    protected $tag = 'API Validations';

    /**
     * Register the new School and redirect the user to the confirmation page.
     *
     * @return A valid JSON Object.
    */
    public function register(Request $request) {
        try
        {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');

            if (Tenant::tenantExists($name)) {
                $msg = "{$name} already exists. " . ResponseMessage::SCHOOL_NAME_UNAVAILABLE;
                Log::error("[ " . $this->tag . '::School Registration ]: ' . $msg);

                return $this->jsonResponse([
                    'status' => "Error",
                    'message' => $msg
                ], HttpStatusCode::BAD_REQUEST);
            }

            // Validate the request.
            $validator = AuthValidation::registerTenant($request->all());

            if ($validator->fails())
            {
                $msg = ResponseMessage::ERROR_CREATING_SCHOOL . " [{$name}].";
                Log::info('[ ' . $this->tag . '::New Tenant Registration Error]: ' . json_encode($validator->failed()));

                return $this->jsonResponse([
                    'status' => "Error",
                    'message' => $msg,
                    'data' => $validator->failed()
                ], HttpStatusCode::BAD_REQUEST);
            }

            // Create the Tenant as requested.
            $tenant = Tenant::registerTenant($name, $email, $password);

            // Make a call to register the URL with CloudFlare if need be.

            // Invite admin
            $tenant->admin->notify(new TenantCreated($tenant->hostname));

            // Build out the message for the end user.
            $msg = nl2br("Hi, {$email} \r\n\r\n");
            $msg .= nl2br("Your School <strong>" . strtoupper($name) . "</strong> has been successfully registered and is now accessible via https://{$tenant->hostname->fqdn}.\r\n\r\n");
            $msg .= nl2br("Admin {$email} has also been invited!\r\n\r\n");
            $msg .= nl2br("Do remember to share this url https://{$tenant->hostname->fqdn} with all staffs and students.\r\n\r\n");
            $msg .= nl2br("Also do not forget to setup access rights for all parties.\r\n\r\n");

            return $this->jsonResponse([
                'status' => 'Success',
                'message' => $msg
            ], HttpStatusCode::OK);
        }
        catch (Exception $e) {
            Log::error($this->tag . '::School Registration Failed ' . $e->getMessage());
            return $this->jsonResponse([
                'status' => 'Error',
                'message' => $e->getMessage()
            ], HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Confirm if the proposed School name is available for usage.
     *
     * @return A valid Json Object.
    */
    public function isavailable($name)
    {
        try
        {
            if (empty(trim($name))) {
                return $this->jsonResponse([
                    'err_status' => 'Error',
                    'err_message' => 'Invalid School Name specified.'
                ], HttpStatusCode::BAD_REQUEST);
            }

            if (!preg_match("/^([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/",$name)) {
                return $this->jsonResponse([
                    'err_status' => 'Error',
                    'err_message' => 'Invalid School Name specified.'
                ], HttpStatusCode::BAD_REQUEST);
            }

            if (Tenant::tenantExists($name)) {
                $msg = "{$name} already exists. " . ResponseMessage::SCHOOL_NAME_UNAVAILABLE;
                Log::error("[ " . $this->tag . '::Is HostName Available ]: ' . $msg);

                return $this->jsonResponse([
                    'status' => "Error",
                    'message' => $msg
                ], HttpStatusCode::BAD_REQUEST);
            }

            return $this->jsonResponse([
                'status' => 'Success',
                'message' => ResponseMessage::SCHOOL_NAME_AVAILABLE
            ], HttpStatusCode::OK);
        }
        catch (Exception $e) {
            Log::error($this->tag . '::Error checking availability of Name ' . $e->getMessage());
            return $this->jsonResponse([
                'status' => 'Error',
                'message' => $e->getMessage()
            ], HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }
}
