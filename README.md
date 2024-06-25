# Share memories (Делитесь воспоминаниями)
Запланирован проект из двух, взаимодействующих между собой приложений.
Одно из которых будет построено на Veu.js для реализации клиентской части приложения.
Второе приложение будет построено на Laravel 11 для реализации серверной части приложения.
Клиент и сервер будет взаимодействовать по API.
База данных будет разворачиваться в Docker с использованием файла docker-compose.yml.  
Основной функционал проекта нацелен на хранение и демонстрацию фото, видео, аудио файлов.
Хранение файлов планируется в S3 хранилище.

## Разворачивание проекта в локальной среде

После клонирования проекта к себе на компьютер для успешного разворачивания нужно учитывать что проект состоит из двух 
отдельных приложений и каждое из них имеет свои требования и особенности.  
Запуск Frontend и Backend приложений осуществляется в двух разных терминалах.

### Клиент (Frontend)
- Все команды выполняются в корне frontend приложения (папка `share_memories_vue`)
- Установить зависимости командой `npm install`
- Выполнить build приложения `npm run build`
- Запустить проект на локальном сервере командой `npm run dev`

### Сервер (Backend)
- Все команды выполняются в корне backend приложения (папка `share_memories_laravel`)
- Установить зависимости командой `composer install`
- Создать файл `.env` командой `cp .env.example .env`
- Сгенерировать ключ - `php artisan key:generate`
- Запустить необходимые контейнеры в docker - `sudo docker compose up -d`
- Запустить миграции - `php artisan migrate:fresh`
- Наполнить базу данных тестовыми данными - `php artisan db:seed`
- Запустить приложение на локальном сервере - `php artisan serve`

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
3. Создаем страницы Главная, Логин, Регистрация и Первую страницу (на которую осуществляется переход после авторизации) с минимальной версткой
4. Устанавливаем AXIOS:
   * Команда для установки: `npm install axios`
   * В файл main.js добавляем:
      * import axios from "axios"; 
      * axios.defaults.withCredentials = true; 
      * axios.defaults.withXSRFToken = true;
5. Авторизация и регистрация:
   * В компоненте TheLogin.vue добавляем в created() запрос CSRF
   * Добавляем proxy (см. файл `vite.config.js`) с правилами
   * Добавляем POST запрос на `/login` в компоненте `TheLogin.vue`. Правильно формируем тело запроса.
   * Так же, временно, создаем кнопку "Выход" с POST запросом на /logout в компоненте `TheLogin.vue`
   * Добавляем POST запрос на `/register` в компоненте `TheRegistration.vue`. Правильно формируем тело запроса.
6. Задействовал Pinia
   * `main.js` - подключил
   * Создал модуль хранилище `user.js`
   * Импортировал в `TheLogin.vue` и `LentaView.vue`
   * !!! В хранилище можно создавать сколько угодно модулей и в компонентах подключать только те, которые нужны
   * !!! Если не нужна логика, то можно обращаться к состоянию напрямую без гетеров и акшенов

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
   * Для проверки работы с хранилищем minIo (аналог aws 3S): 
     * Внес изменения в файл  /share_memories_laravel/config/filesystems.php
     * 's3' => [..., 'throw' => true,],
     * В web клиенте min.io вручную создал новый bucket test
     * Создал тестовую страницу, тестовый контроллер, тестовый роут и проверил работу `min.io`. Тестовые файлы удалены перед выполнением коммита
     * !!! В дальнейшем, для работы с хранилищем нужно вручную создавать bucket и записывать его в `.env`
   * Проверил работу базы данных, создав подключение и накатил миграции командой `php artisan migrate:fresh`
4. Маршрутизация API и авторизация с регистрацией
   * Включаем маршрутизацию API: `php artisan install:api` (устанавливается Laravel Sanctum, появляется routes/api.php)
   * Устанавливаем  Fortify: `composer require laravel/fortify`
   * Публикуем ресурсы Fortify: `php artisan fortify:install`
   * Обновляем таблицы базы данных (предварительно запустив их в докере): `php artisan migrate`, незабываем про сиды
   * В файле `/config/fortify.php`:
     * 'features' => \[Features::registration(), Features::resetPasswords(), Features::emailVerification(), \], <- остальные службы закомментировал
     * 'views' => false, <- отключил маршруты на страницы авторизации, регистрации и т. п.
     * !!! если будет нужно реализовать сброс пароля, следует определить маршрут с именем password.reset
   * GET запрос на адрес 127.0.0.1:8000/sanctum/csrf-cookie в ответе возвращает токен и сессию
   * Маршруты и логика авторизации и регистрации готовы к использованию.
5. Редактирование User
   * Добавил поля в миграции (nullable), если новые поля обязательны, то нужно их добавить в фабрику
   * Добавил эти же поля в модель User (в $fillable)
   * В фале CreateNewUser.php в валидации добавил правила для этих полей и добавил их в создание модели
