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
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->text('SubDomainConference')->comment('المفتاح الأساسي لربط الأهداف بالمؤتمر');
            $table->text('member_attribute')->comment('صفة العضو : رئيس اللجنة التحضيرية');
            $table->text('member_attribute_en')->comment('صفة العضو : رئيس اللجنة التحضيرية');
            $table->text('member_name')->comment('اسم العضو');
            $table->text('member_name_en')->comment('اسم العضو');
            $table->text('member_role')->comment('دور العضو');
            $table->text('member_role_en')->comment('دور العضو');
            $table->text('member_email')->comment('البريد الإلكتروني للعضو');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committees');
    }
};
