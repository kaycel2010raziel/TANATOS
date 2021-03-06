-- MySQL Script generated by MySQL Workbench
-- Thu Oct 28 08:12:29 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema 2IP
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 2IP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `2IP` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `2IP` ;

-- -----------------------------------------------------
-- Table `2IP`.`GENERAL_ESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GENERAL_ESTADO` (
  `IDGENERAL_ESTADO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(100) NOT NULL,
  `DESCRIPCION` VARCHAR(200) NULL,
  `IDPADRE` INT NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDGENERAL_ESTADO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`GENERAL_INSTITUCION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GENERAL_INSTITUCION` (
  `IDGENERAL_INSTITUCION` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(100) NOT NULL,
  `SIGLA` VARCHAR(45) NULL,
  `LOGO` VARCHAR(50) NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDGENERAL_INSTITUCION`),
  INDEX `fk_GENERAL_INSTITUCION_GENERAL_ESTADO_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_GENERAL_INSTITUCION_GENERAL_ESTADO`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`GENERAL_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GENERAL_USUARIO` (
  `IDGENERAL_USUARIO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(150) NOT NULL,
  `APELLIDO` VARCHAR(150) NOT NULL,
  `CORREO` VARCHAR(150) NOT NULL,
  `TELEFONO` VARCHAR(25) NULL,
  `PASSWORD` VARCHAR(150) NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_ESTADO` INT NOT NULL,
  `FKGENERAL_INSTITUCION` INT NOT NULL,
  PRIMARY KEY (`IDGENERAL_USUARIO`),
  INDEX `fk_GENERAL_USUARIO_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  INDEX `fk_GENERAL_USUARIO_GENERAL_INSTITUCION1_idx` (`FKGENERAL_INSTITUCION` ASC),
  CONSTRAINT `fk_GENERAL_USUARIO_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GENERAL_USUARIO_GENERAL_INSTITUCION1`
    FOREIGN KEY (`FKGENERAL_INSTITUCION`)
    REFERENCES `2IP`.`GENERAL_INSTITUCION` (`IDGENERAL_INSTITUCION`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`USUARIO_ROL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`USUARIO_ROL` (
  `IDUSUARIO_ROL` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(75) NOT NULL,
  `DESCRIPCION` VARCHAR(150) NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_USUARIO` INT NOT NULL,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDUSUARIO_ROL`),
  INDEX `fk_USUARIO_ROL_GENERAL_USUARIO1_idx` (`FKGENERAL_USUARIO` ASC),
  INDEX `fk_USUARIO_ROL_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_USUARIO_ROL_GENERAL_USUARIO1`
    FOREIGN KEY (`FKGENERAL_USUARIO`)
    REFERENCES `2IP`.`GENERAL_USUARIO` (`IDGENERAL_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_ROL_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`GENERAL_FACTOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GENERAL_FACTOR` (
  `IDGENERAL_FACTOR` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(75) NOT NULL,
  `DESCRIPCION` VARCHAR(150) NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKESTADO` INT NOT NULL,
  PRIMARY KEY (`IDGENERAL_FACTOR`),
  INDEX `fk_GENERAL_FACTOR_GENERAL_ESTADO1_idx` (`FKESTADO` ASC),
  CONSTRAINT `fk_GENERAL_FACTOR_GENERAL_ESTADO1`
    FOREIGN KEY (`FKESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`USUARIO_FACTOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`USUARIO_FACTOR` (
  `IDUSUARIO_FACTOR` INT NOT NULL AUTO_INCREMENT,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_USUARIO` INT NOT NULL,
  `FKGENERAL_FACTOR` INT NOT NULL,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDUSUARIO_FACTOR`),
  INDEX `fk_USUARIO_FACTOR_GENERAL_USUARIO1_idx` (`FKGENERAL_USUARIO` ASC),
  INDEX `fk_USUARIO_FACTOR_GENERAL_FACTOR1_idx` (`FKGENERAL_FACTOR` ASC),
  INDEX `fk_USUARIO_FACTOR_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_USUARIO_FACTOR_GENERAL_USUARIO1`
    FOREIGN KEY (`FKGENERAL_USUARIO`)
    REFERENCES `2IP`.`GENERAL_USUARIO` (`IDGENERAL_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_FACTOR_GENERAL_FACTOR1`
    FOREIGN KEY (`FKGENERAL_FACTOR`)
    REFERENCES `2IP`.`GENERAL_FACTOR` (`IDGENERAL_FACTOR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_FACTOR_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`GEOGRAFIA_DEPARTAMENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GEOGRAFIA_DEPARTAMENTO` (
  `IDGEOGRAFIA_DEPARTAMENTO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(75) NOT NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDGEOGRAFIA_DEPARTAMENTO`),
  INDEX `fk_GEOGRAFIA_DEPARTAMENTO_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_GEOGRAFIA_DEPARTAMENTO_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`GEOGRAFIA_MUNICIPIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`GEOGRAFIA_MUNICIPIO` (
  `IDGEOGRAFIA_MUNICIPIO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(45) NOT NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGEOGRAFIA_DEPARTAMENTO` INT NOT NULL,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDGEOGRAFIA_MUNICIPIO`),
  INDEX `fk_GEOGRAFIA_MUNICIPIO_GEOGRAFIA_DEPARTAMENTO1_idx` (`FKGEOGRAFIA_DEPARTAMENTO` ASC),
  INDEX `fk_GEOGRAFIA_MUNICIPIO_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_GEOGRAFIA_MUNICIPIO_GEOGRAFIA_DEPARTAMENTO1`
    FOREIGN KEY (`FKGEOGRAFIA_DEPARTAMENTO`)
    REFERENCES `2IP`.`GEOGRAFIA_DEPARTAMENTO` (`IDGEOGRAFIA_DEPARTAMENTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GEOGRAFIA_MUNICIPIO_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2IP`.`INSUMO_NOTA_TIPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2IP`.`INSUMO_NOTA_TIPO` (
  `IDINSUMO_NOTA_TIPO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(50) NOT NULL,
  `DESCRIPCION` VARCHAR(150) NULL,
  `FECHA_HORA` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `FKGENERAL_ESTADO` INT NOT NULL,
  PRIMARY KEY (`IDINSUMO_NOTA_TIPO`),
  INDEX `fk_INSUMO_NOTA_TIPO_GENERAL_ESTADO1_idx` (`FKGENERAL_ESTADO` ASC),
  CONSTRAINT `fk_INSUMO_NOTA_TIPO_GENERAL_ESTADO1`
    FOREIGN KEY (`FKGENERAL_ESTADO`)
    REFERENCES `2IP`.`GENERAL_ESTADO` (`IDGENERAL_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
