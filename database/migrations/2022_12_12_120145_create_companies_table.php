<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('registration_number', 11);
            $table->date('foundation_date');
            $table->string('country', 100);
            $table->string('zip_code', 50);
            $table->string('city', 100);
            $table->string('street_address', 100);
            $table->string('latitude', 30);
            $table->string('longitude', 30);
            $table->string('owner', 100);
            $table->integer('employees');
            $table->string('activity', 50);
            $table->boolean('active')->default(true);
            $table->string('email', 100)->unique();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
