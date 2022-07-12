<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $stocks_id
 * @property int $productions_id
 * @property int $order_quantity
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Stock $stock
 * @property \App\Model\Entity\Production $production
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'stocks_id' => true,
        'productions_id' => true,
        'order_quantity' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'stock' => true,
        'production' => true,
    ];
}
