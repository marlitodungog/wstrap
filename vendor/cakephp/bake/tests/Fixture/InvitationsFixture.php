<?php
/**
 * CakePHP(tm) Tests <http://book.cakephp.org/2.0/en/development/testing.html>
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://book.cakephp.org/2.0/en/development/testing.html CakePHP(tm) Tests
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Bake\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvitationsFixture
 *
 */
class InvitationsFixture extends TestFixture
{
    /**
     * fields property
     *
     * @var array
     */
    public $fields = [
        'id' => ['type' => 'integer'],
        'sender_id' => ['type' => 'integer', 'null' => false],
        'receiver_id' => ['type' => 'integer', 'null' => false],
        'body' => 'text',
        'created' => 'datetime',
        'updated' => 'datetime',
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
            'sender_idx' => ['type' => 'foreign', 'columns' => ['sender_id'], 'references' => ['users', 'id']],
            'receiver_idx' => ['type' => 'foreign', 'columns' => ['receiver_id'], 'references' => ['users', 'id']],
        ]
    ];

    /**
     * records property
     *
     * @var array
     */
    public $records = [
        [
            'sender_id' => 1,
            'receiver_id' => 1,
            'body' => 'Try it out!',
        ]
    ];
}
