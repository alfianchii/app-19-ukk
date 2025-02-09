<h1 align="center">Welcome to Lidia! 👋</h1>

![Landing Page](https://github.com/alfianchii/assets-19-ukk/blob/main/public/assets/lidia-welcome.png?raw=true)

[![All Contributors](https://img.shields.io/github/contributors/alfianchii/assets-19-ukk)](https://github.com/alfianchii/assets-19-ukk/graphs/contributors)
![GitHub last commit](https://img.shields.io/github/last-commit/alfianchii/assets-19-ukk)

---

<h2 id="tentang">🤔 What is Lidia?</h2>

Library digital application with a modern and clean layout, this page features a striking hero section with a bold call-to-action, along with easy-to-scan service descriptions, reviews, and location sections.

<h2 id="fitur">🤨 What features are available in Lidia?</h2>

-   [Mazer Bootstrap Template](https://github.com/zuramai/mazer)
    -   Dark and light mode
    -   Dashboard UI
-   Landing Page
    -   Homepage
    -   Feature
    -   Service
    -   Review
    -   Location
    -   Books
    -   Book's genres
-   Authentication
    -   Registration
    -   Login
-   Multi User
    -   Admin
        -   Manageable users
        -   Manageable books
        -   Manageable book's genres
        -   Overview all of data
        -   Excel generator
    -   Officer
        -   Handling book receipts
        -   Excel generator
    -   Reader
        -   Search books
        -   Review books
        -   Wishlist books
        -   See their own receipts
    -   All
        -   Review to a book on Landing Page
        -   Login
        -   Logout
-   Searchable Landing Page
    -   Books
    -   Book's genres

<h2 id="testing-account">👤 Default account for testing</h2>

### 👨‍🏫 Admin

-   Username: alfianchii
-   Password: password

### 🧖 Officer

-   Username: lolioverflow
-   Password: password

### 🧗 Reader

-   Username: moepoi
-   Password: password

<h2 id="demo">🏠 Demo page</h2>

<p>The demo page is currently unavailable. Therefore, it is advisable for you to try it locally by following the installation steps below.</p>

<h2 id="pre-requisite">💾 Pre-requisite</h2>

<p>Here are the prerequisites required for installing and running the application.</p>

-   PHP 8.2.8 & Web Server (Apache, Lighttpd, or Nginx)
-   Database (MariaDB w/ v11.0.3 or PostgreSQL)
-   Web Browser (Firefox, Safari, Opera, etc)

<h2 id="installation">💻 Installation</h2>

<h3 id="develop-yourself">🏃‍♂️ Develop by yourself</h3>
1. Clone repository

```bash
git clone https://github.com/alfianchii/assets-19-ukk
cd assets-19-ukk
composer install
npm install
cp .env.example .env
```

2. Database configuration through the `.env` file

```conf
APP_DEBUG=true
DB_DATABASE=db_19_ukk
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

3. Migration and symlink

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Launch the website

```bash
npm run dev
# Run in different terminal
php artisan serve
```

<h3 id="develop-docker">🐳 Develop w/ Docker</h3>

-   Clone the repository:

```bash
git clone https://github.com/alfianchii/assets-19-ukk
cd assets-19-ukk
```

-   Copy `.env.example` file with `cp .env.example .env` and configure database:

```conf
APP_DEBUG=true
DB_HOST=mariadb
DB_DATABASE=db_19_ukk
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

-   Make sure you have Docker installed and run:

```bash
docker compose up --build -d
```

-   Install dependencies:

```bash
docker compose run --rm composer install
docker compose run --rm npm install
```

-   Laravel setups:

```bash
docker compose run --rm laravel-setup
```

-   Run locally:

```bash
docker compose run --rm --service-ports npm run dev
```

-   Pages
-   -   App: `http://127.0.0.1`
-   -   PhpMyAdmin: `http://127.0.0.1:8888`
-   -   MailHog: `http://127.0.0.1:8025`

<h4 id="docker-commands">🔐 Commands</h4>

-   Composer
-   -   `docker compose run --rm composer install`
-   -   `docker compose run --rm composer require laravel/breeze --dev`
-   -   Etc

-   NPM
-   -   `docker compose run --rm npm install`
-   -   `docker compose run --rm --service-ports npm run dev`
-   -   Etc

-   Artisan
-   -   `docker compose run --rm artisan serve`
-   -   `docker compose run --rm artisan route:list`
-   -   Etc

<h2 id="production">🌐 Production</h2>

<h3 id="deployment-docker-vps">🐳 Deployment w/ Docker (use Virtual Private Server)</h3>

-   Clone the repository w/ SSH method `git clone git@github.com:alfianchii/app-19-ukk` and go to the directory with `cd app-19-ukk` command.

-   Copy `.env.example` file to `.env` and do configs.

```conf
# App
APP_ENV=production
APP_DEBUG=false
APP_URL=127.0.0.1
APP_PORT=8002

# DB
DB_HOST=mariadb
DB_DATABASE=db_19_ukk
DB_USERNAME=your-vps-username
DB_PASSWORD=your-vps-password
```
-   Let's build with `docker compose -f ./docker-compose.prod.yaml up -d --build` command.

-   Install its dependencies.

```bash
docker compose -f ./docker-compose.prod.yaml run --rm composer install --optimize-autoloader --no-dev
docker compose -f ./docker-compose.prod.yaml run --rm npm install
```

-   Build the assets with dockerized Vite.js command: `docker compose -f ./docker-compose.prod.yaml run --rm npm run build`.

-   Do Laravel setups with existing Docker's custom command: `docker compose -f ./docker-compose.prod.yaml run --rm laravel-setup`.

- Setup your domain and SSL certificate with Nginx configuration:

```nginx
server {
  server_name your-domain.com www.your-domain.com;

  location / {
    proxy_pass http://127.0.0.1:8002;
    proxy_set_header Host $host;
    proxy_set_header X-Real-IP $remote_addr;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header X-Forwarded-Proto $scheme;
  }

  error_log /var/log/nginx/your-domain_error.log;
  access_log /var/log/nginx/your-domain_access.log;
}
```

- Setup SSL certificate with Certbot:

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d your-domain.com -d www.your-domain.com
sudo ln -s /etc/nginx/sites-available/your-domain.com /etc/nginx/sites-enabled/
sudo systemctl reload nginx
```

-   Congrats! Your app is ready to be served. You can access it on your domain and with HTTPS protocol~

<h2 id="pembuat">🧍 Author</h2>

<p>Lidia is created by <a href="https://instagram.com/alfianchii">Alfian</a>.</p>
