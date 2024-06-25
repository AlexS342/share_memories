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
        Schema::create('files', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->autoIncrement();
            $table->bigInteger('user_id')->comment('id владельца альбома');
            $table->bigInteger('album_id')->comment('ID альбома, в котором находится файл');

            $table->string('name')->comment('пользовательское имя файла без расширения');
            $table->text('description')->nullable()->comment('Описание файла');
            $table->enum('rights', RightsEnum::getEnums())->comment('Права доступа к файлу');

            $table->string('hash_name')->comment('имя файла в хранилище');
            $table->integer('size')->comment('Размер файла');
            $table->string('type')->comment('тип файла');
            $table->string('expansion')->comment('MIME расширение файла');

            $table->bigInteger('created_at')->comment('дата загрузки файла');
            $table->bigInteger('updated_at')->comment('дата последних изменений');
            $table->bigInteger('deleted_at')->nullable()->default(null)->comment('Дата удаления файла');
        });

        Schema::table('files', function (Blueprint $table) {
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
        Schema::dropIfExists('files');
    }
};
