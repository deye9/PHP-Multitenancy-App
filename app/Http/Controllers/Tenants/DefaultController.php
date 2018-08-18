<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // Get current Hostname
        $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();

        // Get FQDN (Fully-Qualified Domain Name) by current hostname
        $fqdn = $hostname->fqdn;
        return view('tenants.welcome', ['tenant_name' => $fqdn]);
    }
}
