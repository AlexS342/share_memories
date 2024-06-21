<?php

use App\Enum\GenderEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('birth_date')->nullable()->comment('дата рождения пользователя');
            $table->enum('gender', GenderEnum::getEnums())->nullable()->comment('Гендер пользователя');
            $table->bigInteger('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('created_at')->comment('дата создания аккаунта');
            $table->bigInteger('updated_at')->comment('дата последних изменений');
            $table->bigInteger('deleted_at')->nullable()->default(null)->comment('Дата удаления аккаунта');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
