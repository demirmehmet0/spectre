<?php

use yii\db\Schema;
use yii\db\Migration;

class m211115_010204_measurement_result extends Migration
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
CREATE TABLE IF NOT EXISTS `spectre`.`measurement_result` (
  `id_result` INT NOT NULL,
  `id_measure` INT NULL,
  `result` FLOAT NULL,
  PRIMARY KEY (`id_result`),
  INDEX `id_measure_index` (),
  INDEX `id_measure_foreign_key_idx` (`id_measure` ASC),
  CONSTRAINT `id_measure_foreign_key`
    FOREIGN KEY (`id_measure`)
    REFERENCES `spectre`.`measure` (`id_measure`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
*/
        $this->createTable(
            'spectre_measurement_result',
            [
                'id_result' => $this->primaryKey(),
                'id_measure' => $this->integer()->null(),
                'result' => $this->float()->null(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-spectre_measurement_result_id_measure',
            'spectre_measurement_result',
            'id_measure',
            'spectre_measure',
            'id_measure',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'id_measure_index',
            'spectre_measurement_result',
            'id_measure'
        );

    }

    public function safeDown()
    {
        $this->dropTable('spectre_measurement_result');
    }
}
