# Laravel E-Commerce Demo

Невеликий інтернет-магазин, реалізований на Laravel 12 з використанням Blade, Livewire, TailwindCSS та Breeze.

## ⚙️ Технології

-   Laravel 12
-   Laravel Breeze (Livewire + Blade)
-   SQLite
-   TailwindCSS
-   Livewire
-   Eloquent ORM
-   Storage (для зображень)
-   Session (для кошика)

## 🧩 Основні можливості

### Публічна частина

-   Каталог товарів (пагінація, сортування, пошук)
-   Сторінка товару
-   Кошик (Livewire)
-   Оформлення замовлення
-   Сторінка підтвердження замовлення

### Адмін-панель (`/admin`)

-   Авторизація
-   CRUD товарів (назва, ціна, опис, кількість, фото)
-   Перегляд та оновлення замовлень
-   Статуси: новий, в обробці, завершено

## Встановлення

1. Клонуй репозиторій

```bash
git clone https://github.com/anakon73/laravel-ecommerce.git
cd laravel-ecommerce
```

2.  Встановлення залежностей

```bash
composer install
npm install && npm run dev
```

3. Налаштуй `.env`

```bash
cp .env.example .env
```

4. Сгенеруй ключ і зроби міграції + сідери

```bash
php artisan key:generate
php artisan migrate --seed
```

5. Створи симлінк до storage

```bash
php artisan storage:link
```

6. Запусти локальний сервер

```
php artisan serve
```

7. Увійди в адмінку:

```pgsql
http://127.0.0.1:8000/login

Email: admin@example.com
Password: password
```
