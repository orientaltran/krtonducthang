<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ScenesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}
