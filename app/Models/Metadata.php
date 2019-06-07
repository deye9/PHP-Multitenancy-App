<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Metadata extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, UsesTenantConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [ 'key', 'value', ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
    */
    protected $auditInclude = [ 'key', 'value', ];

    public static function IsProfileValid()
    {
        $res = Metadata::where('key', '=', 'Company Profile')->exists();
        return ($res == 1) ? true : false;
    }

    public static function GetProfile() {
        // Remember to check for null just in case it fails.
       return Metadata::whereRaw("lower(key) = 'company profile'")->first();
    }

    public static function GetKeys() {
        // Remember to check for null just in case it fails.
        return Metadata::select('key')->orderBy('key', 'asc')->distinct()->get();
    }

    public static function GetBranches() {
        // Remember to check for null just in case it fails.
        $a = array("id" => 0, "key" => "Branch", "value" => "Head Office");
        $meta = Metadata::select('id', 'key', 'value->branchName AS value')->whereRaw("lower(key) = 'branch'")->orderBy('id', 'asc')->get();

        $value = json_decode($meta);

        // Insert element to the begining of the array.
        array_unshift($value, $a);
        return $value;
    }

    public static function keyFilter($keyName) {
        return Metadata::whereRaw("lower(key) = lower('" . $keyName . "')")->orderBy('id', 'asc')->get();
    }

    public static function getBranch($branchName) {
        return Metadata::where('value->branchName', '=', $branchName)->first();
    }

    public static function branchExists($branchName): string {
        $res = Metadata::where('value->branchName', '=', $branchName)->exists();
        return (boolval($res) ? 'true' : 'false');
    }

    public static function branchUrlExists($branchUrl): string {
        $res = Metadata::where('value->branchUrl', '=', $branchUrl)->exists();
        return (boolval($res) ? 'true' : 'false');
    }
}
