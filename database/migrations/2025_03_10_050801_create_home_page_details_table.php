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
        Schema::create('home_page_details', function (Blueprint $table) {
            $table->id();
            $table->text('SubDomainConference')->comment('العنوان الفرعي هذا المفتاح');
            $table->text('themeConference')->comment('شعار المؤتمر');
            $table->text('introductionConference')->comment('المقدمة');
            $table->text('partnersConference')->nullable()->comment('المؤسسات المتعاونة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_details');
    }
};
