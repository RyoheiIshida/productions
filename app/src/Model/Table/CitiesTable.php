<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CitiesTable extends Table
{
    public function initialize(array $config)
    {
        $this->settable('cities');
        $this->addBehavior('Timestamp');
    }
}