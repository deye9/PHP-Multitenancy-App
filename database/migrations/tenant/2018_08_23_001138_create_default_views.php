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
                        SELECT t.role_id, t.\"group\" AS parent, array_to_json(array_agg(row_to_json(t.*))) AS items FROM ( SELECT p.name,
                        p.title, p.component, p.\"group\", r.role_id, p.icon, p.target FROM permissions p JOIN role_permissions r ON r.permission_id = p.id) t
                        GROUP BY t.\"group\", t.role_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement("DROP VIEW IF EXISTS public.permission;");
    }
}

// CREATE FUNCTION public.user_permissions(IN roleid bigint DEFAULT 0)
//     RETURNS "char"
//     LANGUAGE 'sql'
//     LEAKPROOF
// AS $BODY$
// select t."group", array_to_json(array_agg(row_to_json(t))) from
// (
// 	select "name", title, component, "group",  icon, target from permissions
// 	p join role_permissions r on r.permission_id = p.id where r.role_id = role_id
// ) t group by t."group"
// $BODY$;

// ALTER FUNCTION public.user_permissions(bigint)
//     OWNER TO gbenga;
