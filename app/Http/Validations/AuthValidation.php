<?php

namespace App\Http\Validations;

use Illuminate\Support\Facades\Validator;

class AuthValidation
{
    /**
     * Validation for Registering a new Tenant.
     * @return mixed
    */
    public static function registerTenant($request) {
        $rule = [
            'name'   => 'required|string|max:100',
            'password'  => 'required|string|min:6',
            'email'  => 'required|string|email|max:255'
        ];
        return Validator::make($request, $rule);
    }

    // /**
    //  * Validation for Registering a new user.
    //  * @return mixed
    // */
    // public static function registerUser()
    // {
    //     return [
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'userrole' => 'required|string|min:3',
    //     ];
    // }

    // /**
    //  * Validation for Registering a new driver on the platform.
    //  * @return mixed
    // */
    // public static function registerDriver()
    // {
    //     return [
    //         'firstname' => 'required|string|max:255',
    //         'middlename' => 'nullable|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'idnumber' => 'required|string|max:255',
    //         'mobile' => 'required|string|max:255',
    //         'DOB' => 'required|date',
    //         'ownerid' => 'required|numeric',
    //         'email' => 'required|string|email|max:255',
    //         'userrole' => 'required|string|min:3',
    //     ];
    // }

    // /**
    //  * Validation for Registering a new vehicle on the platform.
    //  * @return mixed
    // */
    // public static function registervehicle()
    // {
    //     return [
    //         'car_year' => 'required|string|max:255',
    //         'car_type' => 'required|string|max:255',
    //         'owner_name' => 'required|string|max:255',
    //         'car_model' => 'required|string|max:255',
    //         'car_model_trim' => 'required|string|max:255',
    //         'car_model_color' => 'required|string|max:255',
    //         'purchase_date' => 'required|date',
    //         'license_plate_number' => 'required|string|max:30',
    //     ];
    // }

    // /**
    //  * Validation for Registering vehicle documents on the platform.
    //  * @return mixed
    // */
    // public static function vehicleDocuments()
    // {
    //     return [
    //         'expirydate' => 'required|date',
    //         'counter' => 'required|numeric',
    //         'vehicleid' => 'required|numeric',
    //         'doctypes' => 'required|string|max:255',
    //         'frequency' => 'required|string|max:255',
    //         'notifytype' => 'required|string|max:255',
    //     ];
    // }

    // /**
    //  * Validation for login
    //  * @return mixed
    //  */
    // public static function loginRules()
    // {
    //     return [
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string|min:6',
    //     ];
    // }

    // /**
    //  * Validation for forgot password
    //  * @return mixed
    //  */
    // public static function forgotPasswordRules()
    // {
    //     return [
    //         'email' => 'required|string|email|max:255',
    //     ];
    // }

    // /**
    //  * Validation for Wallet Registraion
    //  * @return mixed
    //  */
    // public static function walletRegistrationRules()
    // {
    //     return [
    //         'walletname' => 'required|string|max:255',
    //         'oncard' => 'required|string|max:255',
    //         'amount' => 'required|string|max:255',
    //         'status' => 'required|string|max:5',
    //     ];
    // }

    // /**
    //  * Validation for Wallet Registraion
    //  * @return mixed
    //  */
    // public static function auditLogRules()
    // {
    //     return [
    //         'audit_source' => 'required|string|max:255',
    //         'audit_enddate' => 'required|date',
    //         'audit_startdate' => 'required|date',
    //     ];
    // }

    // /**
    //  * Validation for reset password
    //  * @return mixed
    //  */
    // public static function resetPasswordRules()
    // {
    //     return [
    //         'email' => 'required|string|email|max:255',
    //         'reset_token' => 'required|string|max:60',
    //         'password' => 'required|string|min:6|confirmed',
    //     ];
    // }
}
