<?php

use yii\db\Schema;
use yii\db\Migration;

class m211115_010205_spectrum extends Migration
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
CREATE TABLE IF NOT EXISTS `spectre`.`spectrum` (
  `id_spectrum` INT NOT NULL,
  `id_measure` INT NULL,
  `result` TEXT(1000) NULL,
  `derivative` TEXT(1000) NULL,
  PRIMARY KEY (`id_spectrum`),
  INDEX `id_measure_index` (`id_measure` ASC),
  CONSTRAINT `id_measure_foreign_key`
    FOREIGN KEY (`id_measure`)
    REFERENCES `spectre`.`measure` (`id_measure`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
*/
        $this->createTable(
            'spectre_spectrum',
            [
                'id_spectrum' => $this->primaryKey(),
                'id_measure' => $this->integer()->null(),
                'result' => $this->text(1000)->null(),
                'derivative' => $this->text(1000)->null(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-spectre_spectrum_id_measure',
            'spectre_spectrum',
            'id_measure',
            'spectre_measure',
            'id_measure',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'id_measure',
            'spectre_spectrum',
            'id_measure'
        );

    }

    public function safeDown()
    {
        $this->dropTable('spectre_spectrum');
    }
}
