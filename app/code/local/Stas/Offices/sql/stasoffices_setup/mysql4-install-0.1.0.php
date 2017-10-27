<?php

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('stasoffices/myoffices');

$installer->getConnection()->dropTable($tableName);

$table = $installer->getConnection()->newTable($tableName)
    ->addColumn('office_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ], 'Office ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, [
        'nullable' => false,
    ], 'Blogpost Title')
    ->addColumn('lat', Varien_Db_Ddl_Table::TYPE_DECIMAL, null, [
        'precision' => 10,
        'scale'     => 6,
        'nullable' => false,
        'comment' => 'Latitude'
    ], 'Blogpost Body')
    ->addColumn('lng', Varien_Db_Ddl_Table::TYPE_DECIMAL, null, [
        'precision' => 10,
        'scale'     => 6,
        'nullable' => false,
        'comment' => 'Longitude'
    ], 'Blogpost Body')
    ->setComment('Stas Offices entity table');

$installer->getConnection()->createTable($table);

$installer->endSetup();