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
        Schema::create('exhibitionobjectives', function (Blueprint $table) {
            $table->id();
            $table->text('SubDomainConference')->comment('المفتاح الأساسي لربط  بالمؤتمر');
            $table->text('title')->comment('عنوان الهدف');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitionobjectives');
    }
};
