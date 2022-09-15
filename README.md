<p align="center">
     <a href="https://github.com/Omaraga/template.git" target="_blank">
        <img src="https://i.postimg.cc/v8kJtjSf/image.png" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>
<p>Изначально проект в режиме разработки, для продакшна надо скомпилировать</p>
Установка
<pre>
git clone https://github.com/Omaraga/template.git
</pre>

Композер
<pre>
php composer install
</pre>
Настройка
<pre>
php init и выбрать DEVELOP
</pre>
<pre>
frontend/config, backend/config, common/config есть файлы с расширением .dev скопировать их и убрать .dev
</pre>
<pre>
в папках frontend/web и backend/web создать папку assets 
</pre>
<p>Создать базу данных и настроить подключение к нему в файле common/config/main-local.php</p>
Запуск миграции миграция создаст нужные таблицы для работы 
<pre>
php yii migrate
</pre>

Запуск миграции для мульти языков
<pre>
php yii migrate/up --migrationPath=@vendor/lajax/yii2-translate-manager/migrations
</pre>

Зарегистрироваться и в базе данных для этого пользователя system_role = 30 можете поставить для входа в админ панель
<h3>Радуйтесь и пользуйтесь</h3>




Структура файлов
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
