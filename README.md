### Как поднять локально

1. Скопировать .env.example в .env:

```bash
cp .env.example .env
```

Подсказка: можно настроить переменные окружения `UID` и `GID` в файле `.env` чтобы совпадали с ID юзера и группы. Можно посмотреть запустив `id -u` и `id -g` в терминале.

2. Стартовать Docker Compose сервисы:

```bash
docker compose -f compose.dev.yaml up -d
```

3. Установить зависимости:

```bash
docker compose -f compose.dev.yaml exec workspace bash composer install
```

4. Запустить миграции:

```bash
docker compose -f compose.dev.yaml exec workspace php artisan migrate
```

5. Открыть приложение:

Открыть в браузере [http://localhost/admin](http://localhost/admin).
