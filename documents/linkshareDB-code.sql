-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema linkshare
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema linkshare
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `linkshare` DEFAULT CHARACTER SET utf8 ;
USE `linkshare` ;

-- -----------------------------------------------------
-- Table `linkshare`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linkshare`.`client` (
  `clientId` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`clientId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `linkshare`.`link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linkshare`.`link` (
  `linkId` INT NOT NULL AUTO_INCREMENT,
  `linkURL` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  `link_clientId` INT NOT NULL,
  PRIMARY KEY (`linkId`),
  INDEX `fk_link_client1_idx` (`link_clientId` ASC) VISIBLE,
  CONSTRAINT `fk_link_client1`
    FOREIGN KEY (`link_clientId`)
    REFERENCES `linkshare`.`client` (`clientId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `linkshare`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linkshare`.`type` (
  `typeId` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NOT NULL,
  `type_linkId` INT NOT NULL,
  PRIMARY KEY (`typeId`, `type_linkId`),
  INDEX `fk_type_link1_idx` (`type_linkId` ASC) VISIBLE,
  CONSTRAINT `fk_type_link1`
    FOREIGN KEY (`type_linkId`)
    REFERENCES `linkshare`.`link` (`linkId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `linkshare`.`favorite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linkshare`.`favorite` (
  `favorite_clientId` INT NOT NULL,
  `favorite_linkId` INT NOT NULL,
  PRIMARY KEY (`favorite_clientId`, `favorite_linkId`),
  INDEX `fk_client_has_link_link1_idx` (`favorite_linkId` ASC) VISIBLE,
  INDEX `fk_client_has_link_client1_idx` (`favorite_clientId` ASC) VISIBLE,
  CONSTRAINT `fk_client_has_link_client1`
    FOREIGN KEY (`favorite_clientId`)
    REFERENCES `linkshare`.`client` (`clientId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_has_link_link1`
    FOREIGN KEY (`favorite_linkId`)
    REFERENCES `linkshare`.`link` (`linkId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
