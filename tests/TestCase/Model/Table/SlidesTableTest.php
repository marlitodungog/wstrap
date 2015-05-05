<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlidesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlidesTable Test Case
 */
class SlidesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Slides' => 'app.slides'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Slides') ? [] : ['className' => 'App\Model\Table\SlidesTable'];
        $this->Slides = TableRegistry::get('Slides', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Slides);

        parent::tearDown();
    }

    public function testFindIsPublish()
    {

        $query = $this->Slides->findAllPublished($this->Slides->find('all',['fields' => ['id', 'title']]));

        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'title' => 'Test case 01'],
            ['id' => 3, 'title' => 'Test case 03']
        ];

        $this->assertEquals($expected, $result);
    }
}
