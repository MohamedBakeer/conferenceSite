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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المنظم
            $table->string('role'); // دوره في التنظيم
            $table->string('photo')->nullable(); // صورة شخصية
            $table->text('cv_link')->nullable(); // رابط السيرة الذاتية
            $table->text('SubDomainConference'); // المفتاح الأساسي لربط بالمؤتمر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
