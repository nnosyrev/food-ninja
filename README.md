### Setting Up the Development Environment

1. Copy the .env.example file to .env and adjust any necessary environment variables:

```bash
cp .env.example .env
```

Hint: adjust the `UID` and `GID` variables in the `.env` file to match your user ID and group ID. You can find these by running `id -u` and `id -g` in the terminal.

2. Start the Docker Compose Services:

```bash
docker compose -f compose.dev.yaml up -d
```

3. Install Laravel Dependencies:

```bash
docker compose -f compose.dev.yaml exec workspace bash composer install
```

4. Run Migrations:

```bash
docker compose -f compose.dev.yaml exec workspace php artisan migrate
```

5. Access the Application:

Open your browser and navigate to [http://localhost/admin](http://localhost/admin).
