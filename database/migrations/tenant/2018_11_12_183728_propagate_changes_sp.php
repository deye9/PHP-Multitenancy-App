<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropagateChangesSp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        DB::unprepared("
            DROP FUNCTION IF EXISTS propagate_changes();

            CREATE OR REPLACE FUNCTION propagate_changes() RETURNS void AS $$

            DECLARE
                branch RECORD;
                hqProfile TEXT DEFAULT '';
                sqlCommand TEXT DEFAULT '';
                tenantID varchar(255) DEFAULT '';
                branchUrl varchar(255) DEFAULT '';
                parentCompany varchar(255) DEFAULT '';
                cur_Branch CURSOR FOR SELECT key, value, value->'branchUrl' url FROM metadata WHERE LOWER(key) = 'branch';

            BEGIN
                -- Get the name of the parent Company from the table.
                SELECT value->'companyname', value CoyName INTO parentCompany, hqProfile FROM metadata WHERE lower(key) = 'company profile';

                -- Open the Cursor
                OPEN cur_Branch;

                LOOP
                    -- Fetch Row into the branch
                    FETCH cur_Branch into branch;

                    -- Exit when there are no more rows to fetch
                    EXIT WHEN NOT FOUND;

                    -- Build the output
                    branchUrl := lower(replace(concat(parentCompany, '_', branch.url, '.erp.dev'), '\"', ''));
                    tenantID := (SELECT dbID.* FROM dblink('dbname=" . env('TENANCY_DATABASE') . "',
                                'select w.uuid from hostnames h inner join websites w on h.website_id = w.id where fqdn = ''' || branchUrl || '''') AS dbID(uuid character varying(191)));

                    sqlCommand := 'DELETE FROM metadata WHERE lower(key) = ''company profile''; INSERT INTO metadata(key, value, created_at, updated_at) VALUES(''Company Profile'', ''' || hqProfile || ''', ''' || CURRENT_TIMESTAMP || ''', ''' || CURRENT_TIMESTAMP || ''');';
                    PERFORM dblink_exec('dbname=' || tenantID, sqlCommand);

                    sqlCommand := 'DELETE FROM metadata WHERE lower(key) = lower(''' || branch.key || '''); INSERT INTO metadata(key, value, created_at, updated_at) VALUES(''' || branch.key || ''', ''' || branch.value || ''', ''' || CURRENT_TIMESTAMP || ''', ''' || CURRENT_TIMESTAMP || ''');';
                    PERFORM dblink_exec('dbname=' || tenantID, sqlCommand);

                END LOOP;

                -- Close the cursor
                CLOSE cur_Branch;

            END;
            $$ LANGUAGE plpgsql;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down()
    {
        DB::unprepared("DROP FUNCTION propagate_changes()");
    }
}
