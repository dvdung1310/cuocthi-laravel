<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('feedback_type');  // Loại phản ánh (hàng giả, lừa đảo trực tuyến, thông tin khác)
            $table->text('content');          // Nội dung phản ánh
            $table->string('full_name');      // Họ và tên người phản ánh
            $table->string('phone_number');   // Số điện thoại
            $table->text('address');          // Địa chỉ người phản ánh
            $table->timestamps();             // Các trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};
