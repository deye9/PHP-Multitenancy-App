<?php

namespace App\Models;

use DB;
use Eloquent;
use Spatie\Permission\Traits\HasRoles;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class UserPermissions extends Eloquent
{
    use UsesTenantConnection, HasRoles;

    protected $table = 'user_permissions';

    public static function getFixes() {
        $meta = [];

        // Get user permissions from the tenant table.
        $attr = json_decode(DB::connection('tenant')->table("user_permissions")->get());

        foreach ($attr as $key => $value) {
            $data = [];
            if (sizeof(json_decode($value->items)) <= 1) {
                array_push($meta, json_decode($value->items)[0]);
            } else {
                $data['title'] = $value->parent;
                $data['group'] = $value->parent;
                $data['name'] = $value->parent;
                $data['icon'] = $value->parent;
                $data['component'] = $value->parent;
                $data['items'] = json_decode($value->items);
                array_push($meta, $data);
            }
        }
        return $meta;
    }

    // $data[$value->parent] = json_decode($value->items);
}
