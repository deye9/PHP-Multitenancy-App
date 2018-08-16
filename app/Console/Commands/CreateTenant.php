<?php

namespace App\Console\Commands;

use App\User;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TenantCreated;

class CreateTenant extends Command
{
    protected $signature = 'tenant:create {name} {password} {email}';

    protected $description = 'Creates a tenant with the provided name and email address e.g. php artisan tenant:create boise test boise@example.com';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        if ($this->tenantExists($name, $email)) {
            $this->error("A tenant with name '{$name}' and/or '{$email}' already exists.");
            return;
        }

        $hostname = $this->registerTenant($name, $email);

        // Switch over to the newly created Tenant
        app(Environment::class)->tenant($hostname->website);
        $this->addAdmin($name, $email, $password)
            ->notify(new TenantCreated($hostname));

        $this->info("Tenant '{$name}' is created and is now accessible at {$hostname->fqdn}");
        $this->info("Admin {$email} can log in using password {$password}");
    }

    private function tenantExists($name, $email)
    {
        return Hostname::where('fqdn', $name)->exists();
    }

    private function registerTenant($name, $email)
    {
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $baseUrl = env('APP_URL_BASE');
        $hostname->fqdn = "{$name}.{$baseUrl}";
        app(HostnameRepository::class)->attach($hostname, $website);

        return $hostname;
    }

    private function addAdmin($name, $email, $password)
    {
        $admin = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        $admin->guard_name = 'web';
        $admin->assignRole('admin');
        return $admin;
    }
}
