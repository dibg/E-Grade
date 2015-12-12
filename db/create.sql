-- MySQL Script generated by MySQL Workbench
-- 12/12/15 12:25:30
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema 3163_3362_3374
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 3163_3362_3374
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `3163_3362_3374` DEFAULT CHARACTER SET utf8 ;
USE `3163_3362_3374` ;

-- -----------------------------------------------------
-- Table `3163_3362_3374`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `3163_3362_3374`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `usertype` ENUM('ADMINISTRATOR', 'SECRETARY', 'PROFESSOR', 'STUDENT') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;