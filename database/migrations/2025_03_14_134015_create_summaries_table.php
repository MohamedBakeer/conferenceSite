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
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->text('SubDomainConference'); // ربط المحاور بالمؤتمر باستخدام المفتاح الفرعي
            $table->text('engineer_name');
            $table->text('engineer_email');
            $table->text('phone_number');
            $table->text('university');
            $table->text('research_title');
            $table->text('file_path_name');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summaries');
    }
};
