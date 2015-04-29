<?php

use Cake\TestSuite\Fixture\FixtureManager;
use Cake\TestSuite\TestCase;

class FakeTestSuite extends TestCase
{
    // Here you can load all the tables/fixtures. See the CakePHP 3.0 documentation
    public $fixtures = ['app.users'];
}

$manager = new FixtureManager();
$fakeTestSuite = new FakeTestSuite();

$manager->fixturize($fakeTestSuite);

// Changing the connection type manually
$loaded = $manager->loaded();
foreach ($loaded as $fixture) {
    // Change this to the connection name in your config/app.default.php you want to use
    if (in_array(env('APP_ENV'), ['codeship', 'circleci'])) {
        $fixture->connection = env('APP_ENV');
    }
}

$manager->load($fakeTestSuite);