<?php

namespace Acquia\Test\Cloud\Api\Response;

use Acquia\Cloud\Api\Response\Databases;

class DatabasesTest extends \PHPUnit_Framework_TestCase {

    protected $data_value;

    public function __construct() {
        $this->data_value = array(
            array('name' => 'data:zero'),
            array('name' => 'data:one'),
            array('name' => 'data:two')
        );
    }

    public function testDatabasesResponseConstructor()
    {
        $responses = new Databases($this->data_value);
        $iterator = $responses->getIterator();
        while($iterator->valid()) {
            $response = $iterator->current();
            $this->assertEquals($response['name'], $iterator->key());
            $this->assertEquals("{$response}", $iterator->key());
            $iterator->next();
        }
    }

}