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
        Schema::create('hyper_links', function (Blueprint $table) {
            $table->id();
            $table->text('SubDomainConference')->comment('العنوان الفرعي هذا المفتاح');
            $table->text('facebookurl');
            $table->text('whatsAppurl');
            $table->text('phoneNUMBER');
            $table->text('faxNUMBER');
            $table->text('CMT3url')->comment('رابط CMT3');
            $table->text('Attendanceurl')->comment('رابط Google Form');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hyper_links');
    }
};
