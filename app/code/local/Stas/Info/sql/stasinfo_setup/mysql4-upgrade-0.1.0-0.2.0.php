<?php

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('stasinfo/myfeedback');

$installer->getConnection()->insert($tableName, [
    'name' => 'Test Name1',
    'email' => 'test@test.com',
    'phone' => '+123456789',
    'message' => 'test message',
    'status' => '0',
    'timestamp' => time(),
]);

$installer->endSetup();
