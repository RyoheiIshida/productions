<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class LargeAreasTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('large_areas');
        $this->setDisplayField('name');
        $this->addBehavior('Timestamp');
    }
}