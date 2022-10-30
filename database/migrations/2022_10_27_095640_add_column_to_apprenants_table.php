<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apprenants', function (Blueprint $table) {
            $table->string('telephone');
            $table->string('CIN');
            $table->date('date_naissance');
            $table->string('parent_telephone');
            $table->string('address');
            $table->string('filiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apprenants', function (Blueprint $table) {
            //
        });
    }
};
