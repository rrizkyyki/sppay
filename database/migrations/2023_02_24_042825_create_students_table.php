<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->char('nisn', 20);
            $table->char('nis', 20);
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('major_id')->constrained('majors');
            $table->longText('address');
            $table->char('phone_number', 20);
            $table->foreignId('spp_id')->constrained('spp');
            $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1=unpaid, 2=paid, 3=expired, 4=cancelled');
            $table->string('image')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
