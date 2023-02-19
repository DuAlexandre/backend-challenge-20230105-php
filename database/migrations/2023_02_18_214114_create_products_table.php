<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger ('code');
            $table->string     ('status')->nullable();
            $table->dateTime   ('imported_t')->nullable()->date;
            $table->longText   ('url')->nullable();
            $table->string     ('creator')->nullable();
            $table->integer    ('created_t')->nullable();
            $table->integer    ('last_modified_t')->nullable();
            $table->string     ('product_name')->nullable();
            $table->string     ('quantity')->nullable();
            $table->string     ('brands')->nullable();
            $table->longText   ('categories')->nullable();
            $table->longText   ('labels')->nullable();
            $table->string     ('cities')->nullable();
            $table->string     ('purchase_places')->nullable();
            $table->string     ('stores')->nullable();
            $table->longText   ('ingredients_text')->nullable();
            $table->string     ('traces')->nullable();
            $table->string     ('serving_size')->nullable();
            $table->float      ('serving_quantity')->nullable();
            $table->integer    ('nutriscore_score')->nullable();
            $table->string     ('nutriscore_grade')->nullable();
            $table->string     ('main_category')->nullable();
            $table->longText   ('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
