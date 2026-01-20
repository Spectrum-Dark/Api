-- Active: 1761759741520@@127.0.0.1@3306@panel_fenix
CREATE DATABASE panel_fenix;
USE panel_fenix;

/* Tabla de usuarios*/

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/* Procedimientos almacenados*/

DELIMITER //
CREATE PROCEDURE sp_insert_user(
    IN p_name VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_password VARCHAR(50)
)
BEGIN
    INSERT INTO users (name, email, password)
    VALUES (p_name, p_email, p_password);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_update_user(
    IN p_id INT,
    IN p_name VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_password VARCHAR(50)
)
BEGIN
    UPDATE users
    SET
        name = p_name,
        email = p_email,
        password = p_password
    WHERE id = p_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_delete_user(
    IN p_id INT
)
BEGIN
    DELETE FROM users
    WHERE id = p_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_get_all_users()
BEGIN
    SELECT id, name, email, create_at, update_at
    FROM users;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_get_user_by_name(
    IN p_name VARCHAR(50)
)
BEGIN
    SELECT id, name, email, password, create_at, update_at
    FROM users
    WHERE name = p_name;
END //
DELIMITER ;