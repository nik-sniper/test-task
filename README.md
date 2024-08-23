## Начало работы
### Установка
```
composer install
npm install
npm run build
cp .env.example .env

```

### Конфигурация
```
php artisan key:generate
```

### Подготовка базы данных
```
touch database/database.sqlite
php artisan migrate --seed
