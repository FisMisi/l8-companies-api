<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerForCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER before_companies_update before update on `companies`
            FOR each row
            begin
                declare errorMsg varchar(255);
                set errorMsg = "You could not update foundation_date!";
                IF new.foundation_date <> old.foundation_date then
                    Signal SQLSTATE "45000"
                        SET MESSAGE_TEXT = errorMsg;
                END IF;
            end;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `companies`');
    }
}
