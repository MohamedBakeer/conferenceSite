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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الراعي
            $table->string('logo'); // رابط صورة الشعار
            $table->enum('category', ['platinum', 'gold', 'silver', 'bronze', 'media']); // تصنيف الراعي
            $table->text('external_link')->nullable(); // رابط الموقع الخارجي
            $table->text('SubDomainConference'); // المفتاح الأساسي لربط بالمؤتمر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
