<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            // Thêm các trường ngày bắt đầu, giờ bắt đầu, ngày kết thúc, giờ kết thúc
            $table->date('start_date')->nullable();      // Ngày bắt đầu
            $table->time('start_time')->nullable();      // Giờ bắt đầu
            $table->date('end_date')->nullable();        // Ngày kết thúc
            $table->time('end_time')->nullable();        // Giờ kết thúc
        });
    }

    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            // Xóa các trường đã thêm trong phương thức `up`
            $table->dropColumn(['start_date', 'start_time', 'end_date', 'end_time']);
        });
    }
};
