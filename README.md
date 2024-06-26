# Share memories (Делитесь воспоминаниями)
Запланирован проект из двух, взаимодействующих между собой приложений.
Одно из которых будет построено на Veu.js для реализации клиентской части приложения.
Второе приложение будет построено на Laravel 11 для реализации серверной части приложения.
Клиент и сервер будет взаимодействовать по API.
База данных будет разворачиваться в Docker с использованием файла docker-compose.yml.  
Основной функционал проекта нацелен на хранение и демонстрацию фото, видео, аудио файлов.
Хранение файлов планируется в S3 хранилище.

## Разворачивание проекта в локальной среде

После клонирования проекта к себе на компьютер для успешного разворачивания нужно учитывать что проект состоит из двух отдельных приложений и каждое из них имеет свои требования и особенности

### Клиент (Frontend)

Инструкция по разворачиванию Frontend приложения будет написана немного позже.

### Сервер (Backend)

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `sudo docker compose up -d`
- `php artisan migrate:fresh`
- `php artisan db:seed`
- `php artisan serve`

## Заметки по разработке проекта

Данный раздел запланирован для сохранения некоторой информации, отражающей ход и этапы разработки проекта

### Клиент (Veu.js)
1. `npm create vue@latest` - создание приложения в корне проекта.  
   * Выбор опций при создании приложения:
     ✔ Project name: … share_memories_vue  
     ✔ Add TypeScript? … No  
     ✔ Add JSX Support? … Yes  
     ✔ Add Vue Router for Single Page Application development? … Yes  
     ✔ Add Pinia for state management? … Yes  
     ✔ Add Vitest for Unit Testing? … Yes  
     ✔ Add an End-to-End Testing Solution? › No  
     ✔ Add ESLint for code quality? … Yes  
     ✔ Add Prettier for code formatting? … No  
     ✔ Add Vue DevTools 7 extension for debugging? (experimental) … Yes  
   
   - после выбора всех опций, предложено обновить npm до версии 10.8.1 при помощи команды `npm install -g npm@10.8.1`, но я предварительно обновил версию Node
     - `nvm install 21.6.2` - установить нужную версию Node
     - `nvm use 21.6.2` - указать, какая из версий Node должна использоваться
     - `nvm alias default 10.16.0` - установить определенную версию Node по умолчанию
     - `npm install -g npm@10.8.1` - связывает определенный npm с текущей версией node
2. Запускаем приложение на локальном сервере для просмотра результата
   - `cd share_memories_vue` - переходим в корень приложения
   - `npm install` - загружаем библиотеки
   - `npm run dev` - запускаем приложение на локальном сервере
   !!! Все дальнейшие действия выполняются в корне или во внутренних папках проекта  
   !!! Проект доступен по ссылке http://localhost:5173/  
   !!! Vue DevTools доступен по ссылке http://localhost:5173/__devtools__/  
3. ???

### Сервер (Laravel)
1. `composer create-project laravel/laravel share_memories_laravel` - создание приложения в корне проекта
2. Запускаем приложение на локальном сервере для просмотра результата:
   * `cd share_memories_laravel` -  - переходим в корень приложения
   * `php artisan serve` - запускаем приложение на локальном сервере
   !!! Все необходимые библиотеки установлены по умолчанию
   !!! Все дальнейшие действия выполняются в корне или во внутренних папках проекта  
   !!! Проект доступен по ссылке http://localhost:5173/
3. Создал файл `docker-compose.yml` с параметрами запуска базы данных и хранилища min.io (PostgreSQL - активно, MySQL - закомментировано, MinIO - активно)  
   * Все параметры подключения внесены в `.env` и `.env.example`  
   * `docker-compose.yml` скопирован в файл `docker-compose.yml.example`  
   * Добавил в файл `.gitignore` файл `docker-compose.yml`, папки `/minio_storage` и `/data` (папки создаются при запуске файла `docker-compose.yml)
   * Внес изменения в файл  /share_memories_laravel/config/filesystems.php
     * 's3' => [..., 'throw' => true,],
   * Создал тестовую страницу, тестовый контроллер, тестовый роут и проверил работу `min.io`. Тестовые файлы удалены перед выполнением коммита
   * Проверил работу базы данных, создав подключение и накатил миграции командой `php artisan migrate:fresh`
4. ???