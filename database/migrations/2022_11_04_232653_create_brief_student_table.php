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
        Schema::create('brief_student', function (Blueprint $table) {
            $table->unsignedBigInteger("id_appr");
            $table->integer("id_brief", false, true);
            $table->foreign("id_appr")->references("id")->on("apprenants");
            $table->foreign("id_brief")->references("id_brief")->on("briefs");
            $table->primary(["id_appr", "id_brief"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brief_student');
    }
};
