<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('code')->unique()->nullable();
            $table->text('username')->unique()->nullable();
            $table->text('name')->nullable();
            $table->text('phone')->nullable()->unique();
            $table->text('email')->unique()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('image')->nullable();
            $table->text('password');
            $table->rememberToken();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
