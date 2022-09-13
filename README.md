# Champions League

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

3. Build the project with the next commands:

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

![screencapture-localhost-8383-2022-09-13-13_58_26](https://user-images.githubusercontent.com/4670039/189884457-d5116cba-17a8-455d-a6f9-f6142ffd4fd7.png)

![screencapture-localhost-8383-fixtures-2022-09-13-13_58_46](https://user-images.githubusercontent.com/4670039/189884599-a7097753-018c-427d-8e05-4c63dbb65c8a.png)

![screencapture-localhost-8383-simulation-2022-09-13-14_05_37](https://user-images.githubusercontent.com/4670039/189885639-276d7e1d-3656-4c8c-9f85-f9bebcc77edb.png)
