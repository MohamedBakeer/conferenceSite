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
        Schema::create('conference_data', function (Blueprint $table) {
            $table->id();
            $table->text('nameConference')->comment('إسم المؤتمر');
            $table->text('nameConference_en')->comment('إسم المؤتمر');
            $table->text('SubDomainConference')->comment('العنوان الفرعي هذا المفتاح');
            $table->text('dateConference')->comment('تاريخ إنطلاق المؤتمر');
            $table->text('activationConference')->comment('حالة المؤتمر')->default('inactive');
            $table->text('Receivingpapers')->comment('إستقبال الورقات')->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conference_data');
    }
};
