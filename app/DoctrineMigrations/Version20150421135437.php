<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20150421135437 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->createSchoolTable($schema);
        $this->createUserTable($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('user');
        $schema->dropTable('school');
    }

    private function createSchoolTable(Schema $schema)
    {
        $table = $schema->createTable('school');

        $table
            ->addColumn('id', 'integer')
            ->setNotnull(true)
            ->setAutoincrement(true)
        ;
        $table->setPrimaryKey(['id']);

        $table
            ->addColumn('name', 'string')
            ->setNotnull(true)
        ;
    }

    private function createUserTable(Schema $schema)
    {
        $table = $schema->createTable('user');
        $schoolTable = $schema->getTable('school');

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
            ->addColumn('school', 'integer')
            ->setNotnull(true)
        ;
        $table->addForeignKeyConstraint($schoolTable, ['school'], ['id']);

        $table
            ->addColumn('username', 'string')
            ->setNotnull(true)
        ;
        $table->addUniqueIndex(['username'], 'unique_username');
    }
}
