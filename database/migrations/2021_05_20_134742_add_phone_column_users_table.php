<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Hàm up được dùng để tạo table, cột hay index mới vào trong database
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //Hàm down đơn giản chỉ dùng để làm ngược lại những thao tác ở hàm up,như xóa,...
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone']);
        });
    }
}
