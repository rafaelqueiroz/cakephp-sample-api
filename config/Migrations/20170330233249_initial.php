<?php

use Phinx\Migration\AbstractMigration;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class Initial extends AbstractMigration
{

    /**
     * @return void
     */
    public function up()
    {

        $table = $this->table('recipes', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'uuid');
        $table->addColumn('user_id', 'uuid');
        $table->addColumn('title', 'string');
        $table->addColumn('body', 'text');
        $table->addColumn('created','datetime');
        $table->addColumn('modified', 'datetime', ['null' => true]);
        $table->create();

        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'uuid');
        $table->addColumn('email', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('recipe_count', 'integer');
        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime', ['null' => true]);
        $table->create();

    }

    /**
     * @return void
     */
    public function down()
    {
        foreach (['recipes', 'users'] as $table) {
            $this->dropTable($table);
        }
    }
}
