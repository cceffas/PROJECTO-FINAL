-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sistema_gest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_gest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_gest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `sistema_gest` ;

-- -----------------------------------------------------
-- Table `sistema_gest`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`alunos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `genero` ENUM('M', 'F') NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `telefone` CHAR(9) NULL DEFAULT NULL,
  `foto` TEXT NULL DEFAULT NULL,
  `numero_bi` CHAR(14) NOT NULL,
  `outros_document` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`certificados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`certificados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `media` FLOAT NOT NULL,
  `alunos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `alunos_id`),
  INDEX `fk_certificados_alunos1_idx` (`alunos_id` ASC) VISIBLE,
  CONSTRAINT `fk_certificados_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`faltas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`faltas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` TINYINT(1) NOT NULL,
  `alunos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_faltas_alunos1_idx` (`alunos_id` ASC) VISIBLE,
  CONSTRAINT `fk_faltas_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`instrutores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`instrutores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `genero` ENUM('M', 'F') NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `telefone` CHAR(9) NULL DEFAULT NULL,
  `foto` TEXT NULL DEFAULT NULL,
  `numero_bi` CHAR(14) NOT NULL,
  `outros_document` TEXT NULL DEFAULT NULL,
  `alunos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_instrutores_alunos1_idx` (`alunos_id` ASC) VISIBLE,
  CONSTRAINT `fk_instrutores_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`pagamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_pagamento` DATETIME NOT NULL,
  `comprovativo` TEXT NOT NULL,
  `alunos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pagamentos_alunos_idx` (`alunos_id` ASC) VISIBLE,
  CONSTRAINT `fk_pagamentos_alunos`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`turmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`turmas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(2) NOT NULL,
  `quantidade_aluno` TINYINT NULL DEFAULT NULL,
  `instrutores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_turmas_instrutores1_idx` (`instrutores_id` ASC) VISIBLE,
  CONSTRAINT `fk_turmas_instrutores1`
    FOREIGN KEY (`instrutores_id`)
    REFERENCES `sistema_gest`.`instrutores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`cursos_instrutores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`cursos_instrutores` (
  `cursos_id` INT NOT NULL,
  `instrutores_id` INT NOT NULL,
  PRIMARY KEY (`cursos_id`, `instrutores_id`),
  INDEX `fk_cursos_has_instrutores_instrutores1_idx` (`instrutores_id` ASC) VISIBLE,
  INDEX `fk_cursos_has_instrutores_cursos1_idx` (`cursos_id` ASC) VISIBLE,
  CONSTRAINT `fk_cursos_has_instrutores_cursos1`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `sistema_gest`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_has_instrutores_instrutores1`
    FOREIGN KEY (`instrutores_id`)
    REFERENCES `sistema_gest`.`instrutores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`turmas_alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`turmas_alunos` (
  `turmas_id` INT NOT NULL,
  `alunos_id` INT NOT NULL,
  PRIMARY KEY (`turmas_id`, `alunos_id`),
  INDEX `fk_turmas_has_alunos_alunos1_idx` (`alunos_id` ASC) VISIBLE,
  INDEX `fk_turmas_has_alunos_turmas1_idx` (`turmas_id` ASC) VISIBLE,
  CONSTRAINT `fk_turmas_has_alunos_turmas1`
    FOREIGN KEY (`turmas_id`)
    REFERENCES `sistema_gest`.`turmas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmas_has_alunos_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sistema_gest`.`alunos_cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_gest`.`alunos_cursos` (
  `alunos_id` INT NOT NULL,
  `cursos_id` INT NOT NULL,
  PRIMARY KEY (`alunos_id`, `cursos_id`),
  INDEX `fk_alunos_has_cursos_cursos1_idx` (`cursos_id` ASC) VISIBLE,
  INDEX `fk_alunos_has_cursos_alunos1_idx` (`alunos_id` ASC) VISIBLE,
  CONSTRAINT `fk_alunos_has_cursos_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `sistema_gest`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alunos_has_cursos_cursos1`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `sistema_gest`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
