<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CitysTable extends Table
{
    public function initialize(array $config)
    {
        $this->settable('citys');
        $this->addBehavior('Timestamp');
    }
}