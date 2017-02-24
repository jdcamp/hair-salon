<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class ClientTest extends PHPUnit_Framework_TestCase
{
    function test_getClientName()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        //Act
        $result = $test_client->getClientName();

        //Assert
        $this->assertEquals($name, $result);
    }
    function test_setClientName()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        $name = 'Robert';
        //Act
        $test_client->setClientName($name);
        $result = $test_client->getClientName();

        //Assert
        $this->assertEquals($name, $result);
    }

    function test_getId()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        //Act
        $result = $test_client->getId();

        //Assert
        $this->assertEquals($id, $result);
    }
    function test_getStylistId()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        //Act
        $result = $test_client->getStylistId();

        //Assert
        $this->assertEquals(1, $result);
    }
    function test_setStylistId()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        $name = 'Robert';
        $stylist_id = 5;
        //Act
        $test_client->setStylistId($stylist_id);
        $result = $test_client->getStylistId();

        //Assert
        $this->assertEquals($stylist_id, $result);
    }

    function test_save()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);

        $test_client->save();

        //Act
        $result = Client::getAll();

        //Assert
        $this->assertEquals($test_client, $result[$test_client->getId()-1]);

    }

    function test_updateName()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        $test_client->save();
        $new_name = 'Robert';
        $test_client->updatename($new_name);

        //Act
        $result = $test_client->getClientName();
        //Assert
        $this->assertEquals("Robert", $result);

    }
    function test_updateStylistId()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id, $name, $stylist_id);
        $test_client->save();
        $new_stylist_id = 2;
        $test_client->updateStylistId($new_stylist_id);

        //Act
        $result = $test_client->getStylistId();
        //Assert
        $this->assertEquals($new_stylist_id, $result);

    }
}



?>
