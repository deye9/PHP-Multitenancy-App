<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{

    public function getTenantName(){
        // Get current Hostname
        $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();

        // Get FQDN (Fully-Qualified Domain Name) by current hostname
        $fqdn = $hostname->fqdn;

        return $fqdn;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('tenants.welcome'); //, ['tenant_name' => $this->getTenantName()]);
    }

    public function home()
    {
        return view('tenants.home'); //, ['tenant_name' => $this->getTenantName()]);
    }
}
