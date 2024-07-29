<?php

use App\Models\config;
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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable()->default(null);
            $table->string('logoHeader')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            $table->string('addresse')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('matricule')->nullable()->default(null);


            $table->string('email')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->decimal("frais", 10,2)->nullable();
            $table->decimal("tax",10,2)->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->timestamps();
        });


       // $config = new config();
       // $config->logo=null;
       // $config->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
