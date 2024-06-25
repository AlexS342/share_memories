<?php

use App\Enum\RightsEnum;
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
        Schema::create('albums', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->autoIncrement();
            $table->bigInteger('user_id')->comment('id владельца альбома');
            $table->bigInteger('album_id')->nullable()->comment('Если альбом вложен в другой альбом, то здесь id альбома в который он вложен');
            $table->string('cover')->nullable()->comment('Ссылка на картинку для обложки альбома');
            $table->string('name')->comment('Название альбома');
            $table->text('description')->nullable()->comment('Описание альбома');
            $table->enum('rights', RightsEnum::getEnums())->comment('Права доступа к альбому');
            $table->bigInteger('created_at')->comment('дата создания альбома');
            $table->bigInteger('updated_at')->comment('дата последних изменений');
            $table->bigInteger('deleted_at')->nullable()->default(null)->comment('Дата удаления альбома');
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->foreign('album_id')
                ->references('id')
                ->on('albums')->cascadeOnDelete();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
