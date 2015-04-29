<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slide Entity.
 */
class Slide extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'caption' => true,
        'link' => true,
        'thumbnail' => true,
        'sorting' => true,
        'is_publish' => true,
    ];
}
