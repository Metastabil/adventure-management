-- Players
CREATE TABLE `players` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `level` INT UNSIGNED DEFAULT 1,
    `active` BOOLEAN DEFAULT FALSE,
    `deleted` BOOLEAN DEFAULT FALSE,
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Users
CREATE TABLE `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `deleted` BOOLEAN DEFAULT FALSE,
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inventories
CREATE TABLE `inventories` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `player_id` INT UNSIGNED NOT NULL,
    `deleted` BOOLEAN DEFAULT FALSE,
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`player_id`) REFERENCES `players` (`id`)
);

-- View Inventories
CREATE VIEW `v_inventories` AS
    SELECT `inventories`.`id`,
           `inventories`.`player_id`,
           `inventories`.`deleted`,
           `inventories`.`created`,
           `inventories`.`updated`,
           `players`.`username`
    FROM `inventories`
        JOIN `players` ON `inventories`.`player_id` = `players`.`id`