<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEvents extends AbstractMigration
{
    public bool $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('events');
        $table->addColumn('event_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('eventName', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('frequency', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('startDateTime', 'timestamp', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('endDateTime', 'timestamp', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('invitees', 'json', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'event_id',
        ]);
        $table->create();
    }
}
