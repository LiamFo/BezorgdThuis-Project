-- MySQL Script generated by MySQL Workbench
-- Sun Oct  9 18:11:48 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema id19625817_project_bezorgthuis
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema id19625817_project_bezorgthuis
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `id19625817_project_bezorgthuis` DEFAULT CHARACTER SET utf8 ;
USE `id19625817_project_bezorgthuis` ;

-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`klanten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`klanten` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`klanten` (
  `idklanten` INT NOT NULL,
  `naam` VARCHAR(45) NULL,
  `achternaam` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `wachtwoord` VARCHAR(45) NULL,
  PRIMARY KEY (`idklanten`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`bedrijf`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`bedrijf` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`bedrijf` (
  `idbedrijf` INT(255) NOT NULL,
  `naambedrijf` VARCHAR(45) NULL,
  `stad` VARCHAR(45) NULL,
  `straat` VARCHAR(45) NULL,
  `huisnummer` INT(10) NULL,
  `website` VARCHAR(200) NULL,
  `contacttelefoon` INT(50) NULL,
  `contactemail` VARCHAR(200) NULL,
  `kvk` VARCHAR(120) NULL,
  `btwnummer` VARCHAR(120) NULL,
  `wachtwoord` VARCHAR(500) NULL,
  PRIMARY KEY (`idbedrijf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`bedrijf`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`bedrijf` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`bedrijf` (
  `idbedrijf` INT(255) NOT NULL,
  `naambedrijf` VARCHAR(45) NULL,
  `stad` VARCHAR(45) NULL,
  `straat` VARCHAR(45) NULL,
  `huisnummer` INT(10) NULL,
  `website` VARCHAR(200) NULL,
  `contacttelefoon` INT(50) NULL,
  `contactemail` VARCHAR(200) NULL,
  `kvk` VARCHAR(120) NULL,
  `btwnummer` VARCHAR(120) NULL,
  `wachtwoord` VARCHAR(500) NULL,
  PRIMARY KEY (`idbedrijf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`klant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`klant` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`klant` (
  `idklant` INT(255) NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(50) NULL,
  `email` VARCHAR(150) NULL,
  `stad` VARCHAR(50) NULL,
  `huisnummer` VARCHAR(45) NULL,
  `straat` VARCHAR(45) NULL,
  `password` VARCHAR(500) NULL,
  PRIMARY KEY (`idklant`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`categorie` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`categorie` (
  `idcategorie` INT(255) NOT NULL,
  `tags` VARCHAR(50) NULL,
  `beschrijving` VARCHAR(100) NULL,
  PRIMARY KEY (`idcategorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`bedrijf_has_categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `id19625817_project_bezorgthuis`.`bedrijf_has_categorie` ;

CREATE TABLE IF NOT EXISTS `id19625817_project_bezorgthuis`.`bedrijf_has_categorie` (
  `bedrijf_idbedrijf` INT(11) NOT NULL,
  `categorie_idcategorie` INT(50) NOT NULL,
  PRIMARY KEY (`bedrijf_idbedrijf`, `categorie_idcategorie`),
  INDEX `fk_bedrijf_has_categorie_categorie1_idx` (`categorie_idcategorie` ASC) VISIBLE,
  INDEX `fk_bedrijf_has_categorie_bedrijf1_idx` (`bedrijf_idbedrijf` ASC) VISIBLE,
  CONSTRAINT `fk_bedrijf_has_categorie_bedrijf1`
    FOREIGN KEY (`bedrijf_idbedrijf`)
    REFERENCES `id19625817_project_bezorgthuis`.`bedrijf` (`idbedrijf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bedrijf_has_categorie_categorie1`
    FOREIGN KEY (`categorie_idcategorie`)
    REFERENCES `id19625817_project_bezorgthuis`.`categorie` (`idcategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id19625817_project_bezorgthuis`.`gerechten`
-- -----------------------------------------------------
 