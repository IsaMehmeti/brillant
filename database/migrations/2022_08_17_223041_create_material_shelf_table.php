<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialShelfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('material_shelf', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('material_id')->constrained();
//            $table->foreignId('shelf_id')->constrained();
//            $table->float('quantity');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_shelf');
    }
}
