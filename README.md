# Блог на Laravel

Проект представляет собой блог с возможностью просмотра постов пользователем, с панелью администратора для работы с постами, категориями, тегами и пользователями, а также с личным кабинетом пользователя с возможностью просмотра оставленных лайков и комментариев.

## Реализованный функционал

Для всех пользователей:

- просмотр списка постов;
- просмотр списка категорий;
- просмотр поста и его комментариев.

Для авторизованного пользователя:

- оставление лайка, отправление комментария;
- просмотр своих лайков и комментариев, их удаление.

Для администратора:

- создание и редактирование категорий, тегов;
- создание и редактирование пользователей с отправлением e-mail;
- создание и редактирование постов, в том числе загрузка изображений.

Функционал пользователей разграничен системой ролей. Неавторизованный пользователь может зарегистрироваться и авторизоваться.

## Галерея

Админ-панель:

![image](https://github.com/YuliaM1/LaravelBlog/assets/64122021/82170114-2777-4ee5-81e7-99f28fa0c39f)

Редактирование поста в админ-панели:

![image](https://github.com/YuliaM1/LaravelBlog/assets/64122021/5d7a2e1d-490b-4eb3-a701-587b7e806ca4)


Профиль:

![image](https://github.com/YuliaM1/LaravelBlog/assets/64122021/664ae3ec-429f-414e-b1c5-72e9339bfb90)

Просмотр поста:

![Nesciunt-provident-enim-iure-nobis-neque](https://github.com/YuliaM1/LaravelBlog/assets/64122021/a0671ea7-7a26-40c4-8453-79a54d832824)

## Установка

- клонировать репозиторий: `git clone`;
- загрузка пакетов: `composer install`, `npm install`;
- создать файл `.env` на основе `.env.example`;
- сгенерировать ключ: `php artisan key:generate`;
- указать подключение к базе данных в `.env`;
- накатить миграции и сгенерировать данные: `php artisan migrate --seed`;
- создать символическую ссылку: `php artisan storage:link`;
- запустить сервер: `npm run dev`.

### Данные

Админ:

- логин: `Admin@mail.ru`;
- пароль: `P@ssw0rd`.
