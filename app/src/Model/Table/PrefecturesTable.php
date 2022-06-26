<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class PrefecturesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prefectures');
        $this->addBehavior('Timestamp');

        $this->hasMany(
            'Citys',
            [
                'foreignKey' => 'prefecture_id', 'joinType' => 'INNER'
            ]
        );
        $this->hasOne('LargeAreas',['foreignKey'=>'prefecture_id']);
    }
}
