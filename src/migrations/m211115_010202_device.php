<?php

use yii\db\Schema;
use yii\db\Migration;

class m211115_010202_device extends Migration
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
CREATE TABLE IF NOT EXISTS `spectre`.`device` (
  `id_device` INT NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `district` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_device`))
ENGINE = InnoDB
*/
        $this->createTable(
            'spectre_device',
            [
                'id_device' => $this->primaryKey(),
                'city' => $this->string(45)->notNull(),
                'district' => $this->string(45)->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('spectre_device');
    }
}
