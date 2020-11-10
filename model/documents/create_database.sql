-- MySQL Script generated by MySQL Workbench
-- Fri Nov  6 13:43:14 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema myForum
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema myForum
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `myForum` DEFAULT CHARACTER SET utf8 ;
USE `myForum` ;

-- -----------------------------------------------------
-- Table `myForum`.`themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`themes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `pseudo` VARCHAR(10) NOT NULL,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC) VISIBLE,
  INDEX `fk_users_roles1_idx` (`role_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `myForum`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`states`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`states` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`topics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`topics` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(5000) NOT NULL,
  `theme_id` INT NOT NULL,
  `state_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_topics_themes_idx` (`theme_id` ASC) VISIBLE,
  INDEX `fk_topics_states1_idx` (`state_id` ASC) VISIBLE,
  INDEX `fk_topics_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_topics_states1`
    FOREIGN KEY (`state_id`)
    REFERENCES `myForum`.`states` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_topics_themes`
    FOREIGN KEY (`theme_id`)
    REFERENCES `myForum`.`themes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_topics_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `myForum`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`opinions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`opinions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(5000) NOT NULL,
  `topic_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_opinions_topics1_idx` (`topic_id` ASC) VISIBLE,
  INDEX `fk_opinions_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_opinions_topics1`
    FOREIGN KEY (`topic_id`)
    REFERENCES `myForum`.`topics` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opinions_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `myForum`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`users_comment_opinions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`users_comment_opinions` (
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `opinion_id` INT NOT NULL,
  `comment` VARCHAR(5000) NOT NULL,
  `points` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_users_has_opinions_opinions1_idx` (`opinion_id` ASC) VISIBLE,
  INDEX `fk_users_has_opinions_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_has_opinions_opinions1`
    FOREIGN KEY (`opinion_id`)
    REFERENCES `myForum`.`opinions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_opinions_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `myForum`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`references`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`references` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NOT NULL,
  `url` VARCHAR(2000) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myForum`.`opinions_has_references`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myForum`.`opinions_has_references` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reference_id` INT NOT NULL,
  `opinion_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UniqueReference` (`reference_id` ASC, `opinion_id` ASC) VISIBLE,
  INDEX `fk_references_has_opinions_opinions1_idx` (`opinion_id` ASC) VISIBLE,
  INDEX `fk_references_has_opinions_references1_idx` (`reference_id` ASC) VISIBLE,
  CONSTRAINT `fk_references_has_opinions_opinions1`
    FOREIGN KEY (`opinion_id`)
    REFERENCES `myForum`.`opinions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_references_has_opinions_references1`
    FOREIGN KEY (`reference_id`)
    REFERENCES `myForum`.`references` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;