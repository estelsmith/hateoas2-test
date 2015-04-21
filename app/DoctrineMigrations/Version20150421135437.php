<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20150421135437 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('user');

        $table
            ->addColumn('id', 'integer')
            ->setNotnull(true)
            ->setAutoincrement(true)
        ;
        $table->setPrimaryKey(['id']);

        $table
            ->addColumn('password', 'string')
            ->setNotnull(true)
        ;

        $table
            ->addColumn('roles', 'json_array')
            ->setNotnull(true)
        ;

        $table
            ->addColumn('username', 'string')
            ->setNotnull(true)
        ;
        $table->addUniqueIndex(['username'], 'unique_username');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('user');
    }
}
