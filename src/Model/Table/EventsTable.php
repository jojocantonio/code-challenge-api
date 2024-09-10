<?php
declare(strict_types=1);

namespace App\Model\Table;

 use Cake\ORM\Table;
 use Cake\ORM\Query;
 use Cake\ORM\RulesChecker;
 use Cake\Validation\Validator;

 class EventsTable extends Table
 {
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('events');
        $this->setDisplayField('eventName');
        $this->setPrimaryKey('event_id');
        $this->addBehavior('Timestamp');
        

    }
 }