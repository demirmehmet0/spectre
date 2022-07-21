<?php

use yii\db\Schema;
use yii\db\Migration;

class m211115_010203_measure extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
/*
CREATE TABLE IF NOT EXISTS `spectre`.`measure` (
  `id_measure` INT NOT NULL AUTO_INCREMENT,
  `id_device` INT NULL,
  `id_user` INT NULL,
  `measure_reason_type` INT NULL,
  `fuel_type` INT NULL,
  `business_name` VARCHAR(45) NULL,
  `tank_name` VARCHAR(45) NULL,
  `pump_no` VARCHAR(45) NULL,
  `product_terminal_origin` VARCHAR(45) NULL,
  `result` FLOAT NULL,
  `result_status` INT NULL,
  `date_create` DATETIME NULL,
  `loc_coord` VARCHAR(45) NULL,
  `sample_temperature` VARCHAR(45) NULL,
  `chamber_temperature` VARCHAR(45) NULL,
  PRIMARY KEY (`id_measure`),
  INDEX `id_device_index` (`id_device` ASC),
  INDEX `id_user_index` (`id_user` ASC),
  CONSTRAINT `id_device_foreign_key`
    FOREIGN KEY (`id_device`)
    REFERENCES `spectre`.`device` (`id_device`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_user_foreign_key`
    FOREIGN KEY (`id_measure`)
    REFERENCES `spectre`.`user` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
*/
        $this->createTable(
            'spectre_measure',
            [
                'id_measure' => $this->primaryKey(),
                'id_device' => $this->integer()->null(),
                'id_user' => $this->integer()->null(),
                'measure_reason_type' => $this->integer()->null(),
                'fuel_type' => $this->integer()->null(),
                'business_name' => $this->string(45)->null(),
                'tank_name' => $this->string(45)->null(),
                'pump_no' => $this->string(45)->null(),
                'product_terminal_origin' => $this->string(45)->null(),
                'result' => $this->float()->null(),
                'result_status' => $this->integer()->null(),
                'date_create' => $this->dateTime()->null(),
                'loc_coord' => $this->string(45)->null(),
                'sample_temperature' => $this->string(45)->null(),
                'chamber_temperature' => $this->string(45)->null(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-spectre_measure_id_device',
            'spectre_measure',
            'id_device',
            'spectre_device',
            'id_device',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-spectre_measure_id_user',
            'spectre_measure',
            'id_user',
            'user_user',
            'id_user',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'id_device',
            'spectre_measure',
            'id_device'
        );

        $this->createIndex(
            'id_user',
            'spectre_measure',
            'id_user'
        );

    }

    public function safeDown()
    {
        $this->dropTable('spectre_measure');
    }
}
