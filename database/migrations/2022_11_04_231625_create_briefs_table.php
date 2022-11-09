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
        Schema::create('briefs', function (Blueprint $table) {
            $table->integer('id_brief', true, true);
            $table->string("title_brief");
            $table->string("descrip_brief");
            $table->date("date_from");
            $table->date("date_to");
            // $table->unsignedBigInteger("id_appr");
            // $table->foreign("id_appr")->references("id")->on("apprenants");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs');
    }
};
