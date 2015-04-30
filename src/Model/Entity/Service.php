<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity.
 */
class Service extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'body' => true,
        'meta_title' => true,
        'meta_keyword' => true,
        'meta_description' => true,
        'is_publish' => true,
        'sorting' => true,
    ];
}
