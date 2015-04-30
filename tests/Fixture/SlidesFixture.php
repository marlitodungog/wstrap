<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SlidesFixture
 *
 */
class SlidesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 180, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'caption' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'link' => ['type' => 'string', 'length' => 90, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'thumbnail' => ['type' => 'string', 'length' => 90, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'sorting' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'is_publish' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'title' => 'Test case 01',
            'caption' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'link' => 'Lorem ipsum dolor sit amet',
            'thumbnail' => 'Lorem ipsum dolor sit amet',
            'sorting' => 1,
            'is_publish' => 1,
            'created' => '2015-04-27 02:04:21',
            'modified' => '2015-04-27 02:04:21'
        ],
        [
            'id' => 2,
            'title' => 'Test case 03',
            'caption' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'link' => 'Lorem ipsum dolor sit amet',
            'thumbnail' => 'Lorem ipsum dolor sit amet',
            'sorting' => 1,
            'is_publish' => 0,
            'created' => '2015-04-27 02:04:21',
            'modified' => '2015-04-27 02:04:21'
        ],
        [
            'id' => 3,
            'title' => 'Test case 03',
            'caption' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'link' => 'Lorem ipsum dolor sit amet',
            'thumbnail' => 'Lorem ipsum dolor sit amet',
            'sorting' => 1,
            'is_publish' => 1,
            'created' => '2015-04-27 02:04:21',
            'modified' => '2015-04-27 02:04:21'
        ],
    ];
}
