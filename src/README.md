Exploiting Application with bad code
run url in application and run current commited code
http://localhost:8051/?viewPath=../.env

Create Database Table
CREATE TABLE users (
    id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    full_name varchar(255) NOT NULL,
    is_active boolean DEFAULT 0 NOT NULL,
    created_at datetime NOT NULL,
    KEY `is_active`(`is_Active`)
);

Adding Indexes
CREATE TABLE users (
    id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) NOT NULL,
    full_name varchar(255) NOT NULL,
    is_active boolean DEFAULT 0 NOT NULL,
    created_at datetime NOT NULL,
    KEY `is_active`(`is_Active`),
    UNIQUE KEY `email`(`email`)
);

describe users;

create table invoices(
    id int unsigned PRIMARY KEY AUTO_INCREMENT,
    amount decimal(10,4),
    user_id int unsigned,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL ON UPDATE CASCADE
);


docker-compose up
docker-compose up -d
docker-compose stop
docker-compose up -d --build
docker exec -it docker-name bash //our docker-name=programming-php
composer require --dev phpunit/phpunit ^9.5
look composer.json and composer.lock and vendor folder in src folder


./vendor/bin/phpunit --filter it_throws_route_not_found_exception
./vendor/bin/phpunit
composer dump-autoload
