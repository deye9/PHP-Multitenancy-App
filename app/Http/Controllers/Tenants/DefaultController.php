<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function getTenantName()
    {
        // Get current Hostname
        $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();

        if (isset($hostname)) {
            // Get FQDN (Fully-Qualified Domain Name) by current hostname
            $fqdn = $hostname->fqdn;

            return $fqdn;
        } else
        {
            return '';
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $tenant_name = $this->getTenantName();
        $data = json_decode(\App\Models\Metadata::GetProfile()['value']);

        if (is_null($data)) {
            $data['catchphase'] = '';
            $data['companyname'] = $tenant_name;
            $data['logo'] = '/images/question_mark.svg';
            $data['theme'] = ['themeColor' => "blue[#2196f3]", 'sideBarOption' => 'light'];
        }
        return view(($tenant_name === '') ? 'welcome' : 'tenants.welcome', ['tenant' => $data]);
    }
}
