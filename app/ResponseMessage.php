<?php

namespace App;

class ResponseMessage
{
    const SCHOOL_NAME_AVAILABLE = 'School Name is available.';
    const SCHOOL_NAME_UNAVAILABLE = 'Please choose another Name or Abbreviation.';
    const ERROR_CREATING_SCHOOL = 'An error occurred while trying to create your School';


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
    const ERROR_LOGIN_USER = 'An error occurred while trying to login user';
    const ERROR_RESETTING_USER_PASSWORD = 'An error occurred while trying to reset user password';
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
