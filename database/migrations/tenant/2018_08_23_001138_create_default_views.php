<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW public.permission AS
            select row_to_json(t) menu from (
                select r.role_id, p.parent_name as parent_menu, (
                    select array_to_json(array_agg(name)) from permissions where parent_name = p.parent_name
                ) as menus from permissions p join role_permissions r on r.permission_id = p.id GROUP BY r.role_id, p.parent_name
            ) t order by t.role_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS public.permission;");
    }
}
