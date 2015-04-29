<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesTable Test Case
 */
class ServicesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Services' => 'app.services'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Services') ? [] : ['className' => 'App\Model\Table\ServicesTable'];
        $this->Services = TableRegistry::get('Services', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Services);

        parent::tearDown();
    }

    public function testFindIsPublish()
    {

        $query = $this->Services->findAllPublished($this->Services->find('all',['fields' => ['id', 'title']]));

        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'title' => 'Test case 01'],
            ['id' => 3, 'title' => 'Test case 03']
        ];

        $this->assertEquals($expected, $result);
    }
}
