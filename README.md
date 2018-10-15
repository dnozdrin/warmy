# Warmy
Raspberry Pi based thermostat system with web control interface (for heating)

[![version][version-badge]][CHANGELOG] [![license][license-badge]][LICENSE]

## Getting Started
These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites
Tested on the next configuration:

Hardware:
- Raspberry Pi 3;
- DS18S20;
- 1 Channel Controllable Relay Board Module;
- Resistors

Software:
- Raspbian GNU/Linux 9.4 (stretch)
- Web server (Apache/Nginx)
- PHP >= 7.1.3 (required extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON)
- MySQL / MariaDB 10.1

How build a thermostat system with Raspberry Pi
- http://tiny.cc/j6i3vy
- http://tiny.cc/o7i3vy
- http://tiny.cc/z7i3vy

Laravel installation issues
- http://tiny.cc/efj3vy

Composer installation issues
- http://tiny.cc/hlj3vy

### Installing
1. Clone the code from the repository via Git or download the files to your Raspberry Pi;
2. Set directories within the `storage` and the `bootstrap/cache` directories writable by your web server;
3. Configure your web server's document / web root to be the `public` directory;
4. Run `composer install` or `composer.phar` (if you don't have composer installed globally);
5. Configure Laravel key: run `php artisan key:generate` in the installation directory and set it to `APP_KEY` key of `.env`;
6. Create a database on the Raspberry Pi (collation `utf8mb4_unicode_ci`);
7. Configure database connection in the `.env` file;
8. Set the language you need in the (`LOCALE` key of `.env`, `en` and `ru` values are supported);
9. Set your timezone (`TIMEZONE` key of `.env`);
10. Set your GPIO pin for a relay (`GPIO_PIN` key of `.env`);
11. Configure the DS18S20 sensor ID:
- in console run `cat /sys/bus/w1/devices/w1_bus_master1/w1_master_slaves`;
- copy the value that starts from `28-` and paste it to `SENSOR_ID` key of the application configuration file (.env);
12. Run `php artisan migrate:refresh --seed` in the installation directory to update the database data.

### Usage
- The active mode is highlighted with yellow;

![alt text](https://img.nozdrin.net/warmy/modes.png)

- Configure modes for heating;

![alt text](https://img.nozdrin.net/warmy/mode.png)

- If no mode is active at the moment no target temperature and mode title are shown;

![alt text](https://img.nozdrin.net/warmy/main.png)

## Built With
* [Laravel](https://laravel.com/) - The web framework used
* [LaravelCollective Forms & HTML](https://laravelcollective.com/) - Forms building tool
* [Bootstrap](https://getbootstrap.com) - Toolkit for developing with HTML, CSS, and JS
* [jQuery](https://jquery.com/) -  A a fast, small, and feature-rich JavaScript library.
* [Timedropper](https://felicegattuso.com/projects/timedropper/) - A jQuery time plugin

## Authors
* **Dmytro Nozdrin** - *Initial work* - [https://nozdrin.net](https://nozdrin.net)

## License
The application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[CHANGELOG]: ./CHANGELOG.md
[LICENSE]: ./LICENSE
[version-badge]: https://img.shields.io/badge/version-1.0.1-blue.svg
[license-badge]: https://img.shields.io/badge/license-MIT-blue.svg
