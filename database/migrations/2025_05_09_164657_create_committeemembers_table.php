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
        Schema::create('committeemembers', function (Blueprint $table) {
            $table->id();

            $table->text('SubDomainConference')->comment('المفتاح الأساسي لربط الأهداف بالمؤتمر');
            $table->text('name');
            $table->text('name_en');
            $table->enum('committee', ['conference', 'preparatory', 'scientific']); // اللجنة: مؤتمر، تحضيرية، علمية
            $table->enum('role', ['رئيس', 'نائب', 'عضو', 'مساعد']); // الدور داخل اللجنة
            $table->text('profession')->nullable(); // المهنة  عضو هيئة تدريس جامعة الزاوية
            $table->text('profession_en')->nullable(); // المهنة  عضو هيئة تدريس جامعة الزاوية
            $table->text('university')->nullable(); // الجامعة  جامعة الزاوية
            $table->text('university_en')->nullable(); // الجامعة  جامعة الزاوية
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('cv_path')->nullable(); // رابط السيرة الذاتية (PDF مثلاً)
            $table->text('photo_path')->nullable(); // رابط الصورة
        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committeemembers');
    }
};
