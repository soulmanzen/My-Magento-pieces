<?php

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('stasinfo/myfeedback');

$installer->getConnection()->addColumn($tableName, 'type', [
    'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
    'length'    => 255,
    'after' => 'timestamp',
    'comment' => 'type'
    ]);

$installer->endSetup();
