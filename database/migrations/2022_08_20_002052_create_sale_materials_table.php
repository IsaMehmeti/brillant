<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_materials', function (Blueprint $table) {
            $table->id();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('unit')->nullable();
            $table->string('amount')->nullable();
            $table->string('material_title')->nullable();
            $table->string('material_category')->nullable();
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_materials');
    }
}
