-- MySQL Script generated by MySQL Workbench
-- Sun Jan 28 09:26:04 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema valor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema valor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `valor` DEFAULT CHARACTER SET utf8 ;
USE `valor` ;

-- -----------------------------------------------------
-- Table `valor`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`cliente` (
  `id_cliente` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`vendedor` (
  `id_vendedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `cedula` INT NOT NULL,
  PRIMARY KEY (`id_vendedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`porcentaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`porcentaje` (
  `id_porcentaje` INT NOT NULL AUTO_INCREMENT,
  `tipo` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `porcentaje` INT NOT NULL,
  PRIMARY KEY (`id_porcentaje`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`cotizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`cotizacion` (
  `id_cotizacion` INT NOT NULL AUTO_INCREMENT,
  `ruc` VARCHAR(45) NOT NULL,
  `id_cliente` INT NOT NULL,
  `id_vendedor` INT NOT NULL,
  PRIMARY KEY (`id_cotizacion`),
  INDEX `fk_cotizacion_cliente1_idx` (`id_cliente` ASC),
  INDEX `fk_cotizacion_vendedor1_idx` (`id_vendedor` ASC),
  CONSTRAINT `fk_cotizacion_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `valor`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cotizacion_vendedor1`
    FOREIGN KEY (`id_vendedor`)
    REFERENCES `valor`.`vendedor` (`id_vendedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`detalle_porcentaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`detalle_porcentaje` (
  `id_detalle_porcentaje` INT NOT NULL AUTO_INCREMENT,
  `montopor` INT NOT NULL,
  `id_cotizacion` INT NOT NULL,
  `id_porcentaje` INT NOT NULL,
  PRIMARY KEY (`id_detalle_porcentaje`),
  INDEX `fk_porcentaje_cotizacion1_idx` (`id_cotizacion` ASC),
  INDEX `fk_detalle_porcentaje_porcentaje1_idx` (`id_porcentaje` ASC),
  CONSTRAINT `fk_porcentaje_cotizacion1`
    FOREIGN KEY (`id_cotizacion`)
    REFERENCES `valor`.`cotizacion` (`id_cotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_porcentaje_porcentaje1`
    FOREIGN KEY (`id_porcentaje`)
    REFERENCES `valor`.`porcentaje` (`id_porcentaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`producto` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `tipo` INT NOT NULL,
  `precio` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`detalle_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`detalle_producto` (
  `id_detalle_producto` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `id_cotizacion` INT NOT NULL,
  `total` INT NOT NULL,
  PRIMARY KEY (`id_detalle_producto`),
  INDEX `fk_producto_tipo_producto1_idx` (`id_producto` ASC),
  INDEX `fk_producto_cotizacion1_idx` (`id_cotizacion` ASC),
  CONSTRAINT `fk_producto_tipo_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `valor`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_cotizacion1`
    FOREIGN KEY (`id_cotizacion`)
    REFERENCES `valor`.`cotizacion` (`id_cotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valor`.`paquete`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valor`.`paquete` (
  `id_paquete` INT NOT NULL AUTO_INCREMENT,
  `id_cotizacion` INT NOT NULL,
  PRIMARY KEY (`id_paquete`),
  INDEX `fk_paquete_cotizacion1_idx` (`id_cotizacion` ASC),
  CONSTRAINT `fk_paquete_cotizacion1`
    FOREIGN KEY (`id_cotizacion`)
    REFERENCES `valor`.`cotizacion` (`id_cotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
