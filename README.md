# To-do planning app

Ports used in the project:
| Software | Port |
|-------------- | -------------- |
| **nginx** | 8383 |
| **phpmyadmin** | 8089 |
| **mysql** | 33011 |
| **php** | 9015 |

## Installation

1. Clone this project:

   ```sh
   git clone https://github.com/muhammetakkurt/champions-league
   ```

2. Inside the folders `./source` and `./` and Generate your own `.env` to docker compose with the next command:

   ```sh
   cp .env.example .env
   cp source/.env.example source/.env
   ```

3. Build the project whit the next commands:

   ```sh
   docker-compose up --build
   ```

4. Update Composer:
   ```sh
   docker-compose run --rm composer update
   ```

5. Run all migrations with seeds:
   ```sh
   docker compose run --rm artisan migrate:fresh --seed
   ```


Run this: http://localhost:8383/

---