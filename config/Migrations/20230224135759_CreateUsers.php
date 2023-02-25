<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');

        //Add Columns
        $table->addColumn("name", "string", [
            "limit" => 255,
            "null" => false,
        ]);
        $table->addColumn("email", "string", [
            "default" => null,
            "limit" => 255,
            "null" => true,
        ]);
        $table->addColumn("phone", "string", [
            "default" => null,
            "limit" => 255,
            "null" => true,
        ]);
        $table->addColumn("gender", "enum", [
            "values" => ["male", "female", "Others"]
        ]);
        $table->addColumn("password", "string", [
            "default" => null,
            "limit" => 255,
            "null" => false,
        ]);
        $table->addColumn("profile_image", "string", [
            "default" => null,
            "limit" => 255,
            "null" => true,
        ]);
        $table->addColumn("created_at", "timestamp", [
            "default" => 'CURRENT_TIMESTAMP',
        ]);
        $table->create();
    }
}
