<?php

namespace App\Helpers;

class Constants
{
    public const SWITCHING_PROTOCOLS = 101;
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NONAUTHORITATIVE_INFORMATION = 203;
    public const NO_CONTENT = 204;
    public const RESET_CONTENT = 205;
    public const PARTIAL_CONTENT = 206;
    public const MULTIPLE_CHOICES = 300;
    public const MOVED_PERMANENTLY = 301;
    public const MOVED_TEMPORARILY = 302;
    public const SEE_OTHER = 303;
    public const NOT_MODIFIED = 304;
    public const USE_PROXY = 305;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const PAYMENT_REQUIRED = 402;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const NOT_ACCEPTABLE = 406;
    public const PROXY_AUTHENTICATION_REQUIRED = 407;
    public const REQUEST_TIMEOUT = 408;
    public const CONFLICT = 408;
    public const GONE = 410;
    public const LENGTH_REQUIRED = 411;
    public const PRECONDITION_FAILED = 412;
    public const REQUEST_ENTITY_TOO_LARGE = 413;
    public const REQUESTURI_TOO_LARGE = 414;
    public const UNSUPPORTED_MEDIA_TYPE = 415;
    public const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    public const EXPECTATION_FAILED = 417;
    public const IM_A_TEAPOT = 418;
    public const INTERNAL_SERVER_ERROR = 500;
    public const NOT_IMPLEMENTED = 501;
    public const BAD_GATEWAY = 502;
    public const SERVICE_UNAVAILABLE = 503;
    public const GATEWAY_TIMEOUT = 504;
    public const HTTP_VERSION_NOT_SUPPORTED = 505;

    // Response Message Constants
    public const SCHOOL_NAME_AVAILABLE = 'School Name is available.';
    public const SCHOOL_NAME_UNAVAILABLE = 'Please choose another Name or Abbreviation.';
    public const ERROR_CREATING_SCHOOL = 'An error occurred while trying to create your School';
    public const EMAIL_INVALID = 'Looks like the email you supplied is not a valid email address.';

    public const USER_LOGIN_ERROR = 'An error occurred while trying to authenticate the user. Kindly re-confirm your Credentials.';
    public const ERROR_RESETTING_USER_PASSWORD = 'An error occurred while trying to reset user password';

    // Remove.
    const USER_CREATED_SUCCESSFULLY = 'Successfully registered new user';
    const LOGIN_SUCCESSFULLY = 'Login successfully';
    const COMPANY_CREATED_SUCCESSFULLY = 'Successfully registered new company';
    const FORGOT_PASSWORD_MAIL_SENT = 'An email containing steps to reset ' .
                                        'your password has been successfully sent you.';
    const PASSWORD_RESET_SUCCESSFULLY = 'Password has been changed successfully.';
    const LOGOUT_SUCCESSFULLY = 'Logout successfully';
    const SUCCESS_CREATING_STAFF = 'New staff created successfully';
    const SUCCESS_UPLOADING_STAFF = ':staff_count staff has been successfully uploaded!';

    const ERROR_CREATING_USER = 'An error occurred while trying to register user';
    const ERROR_CREATING_COMPANY = 'An error occurred while trying to register company';
    const ERROR_LOGIN_OUT_PASSWORD = 'An error occurred while trying to logout user';

    const PROJECT_CREATED = 'Project has been created successfully.';
    const ERROR_CREATING_PROJECT = 'Opps, I encountered an error while trying to create the requested Project.';
    const ERROR_CREATING_DEPARTMENT = 'An error occurred while trying to create a department';
    const ERROR_CREATING_JOB_TITLES = 'An error occurred while trying to create a Job Title';
    const ERROR_CREATING_TEAMS = 'An error occurred while trying to create a Team';
    const ERROR_UPDATING_DEPARTMENT = 'An error occurred while trying to update a department';
    const ERROR_UPDATING_JOB_TITLE = 'An error occurred while trying to update a Job Title';
    const ERROR_UPDATING_TEAM = 'An error occurred while trying to update Team';

    // FEEDBACK
    const ERROR_CREATING_FEEDBACK = 'An error occurred while creating feedback';

    // PROJECT
    const ERROR_DELETING_PROJECT = 'An error occurred while deleting project';
    const PROJECT_DELETED = 'Project deleted successfully';
    const ERROR_UPDATING_PROJECT = 'An error occurred while updating project';

    // COMPANY
    const ERROR_CREATING_STAFF = 'An error occurred while creating new staff';
    const ERROR_INVALID_UPLOADED_FILE = 'File uploaded is invalid';
    const ERROR_IN_UPLOADED_DATA = 'Some of the data uploaded are invalid';

}
