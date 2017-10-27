<?php

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('staspurchase/orderproduct');

$installer->getConnection()->dropTable($tableName);


$table = $installer->getConnection()->newTable($tableName)
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Order ID')
    ->addColumn('costumer_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false,
    ), 'Costumer Name')
    ->addColumn('costumer_email', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false,
    ), 'Costumer E-mail')
    ->addColumn('product_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false,
    ), 'Product Name')
    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ), 'Timestamp')
    ->setComment('Stas_Purchase_Orderproduct entity table');

$installer->getConnection()->createTable($table);

$installer->endSetup();