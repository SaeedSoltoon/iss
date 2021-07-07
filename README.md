## Laravel Insurance Sale System

### This reposirtory is created for Backend Software Engineer (PHP) - Fintech | Assignment and Utilizes This repo as base Project Structure.([Laravel-Boilerplate](https://github.com/rappasoft/laravel-boilerplate))

This project makes lite use of DDD. It is not a requirement, and you can easily refactor back to the default Laravel file structure.

### Installation and Usage Instructions

After cloning the repository, make sure to copy `.env.example` to `.env` and edit the params for your needs.

_NOTE:_ If you want to use Docker setup process, make sure that `DB_HOST` param in `.env` file match the database service name that defines in `docker-compose.yml`, defaults is `iss-db`.

If you don't have Docker on your machine skip below steps, and just follow the main ([Laravel-Installation-Guide](https://laravel.com/docs/8.x/installation)) guide to up and running the project.

### Setup Using Docker

This repository Utilizes a Makefile for easier installation process.

-   Open your desire terminal and run this command.

```bash
make init
```

Above command tries to install the image and configure it for you. feel free to check it out and make changes if you want to.

-   After that run this command to start the container and runs the project.

```bash
make up
```

If setup process finished successfully you should see this message in your terminal.

```bash
Insurance Sale System is running at http://127.0.0.1:8010, and you can check the api documentations at http://127.0.0.1:8010/api/documentation
```

You can check the mentioned urls in your browser, and if you want to stop it just hit `ctrl+c`.

### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret

### Official Laravel Boilerplate Documentation

[Click here for the official documentation](http://laravel-boilerplate.com)

### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
