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
    protected function tearDown()
    {
        Stylist::deleteAll();
        Client::deleteAll();
    }
    function test_getClientName()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);

        $test_client->save();

        //Act
        $result = Client::getAll();
        foreach ($result as  $client)
        {
            if($client == $test_client)
            {
                $result = $client;
            }
        }
        //Assert
        $this->assertEquals($test_client, $result);
    }

    function test_updateName()
    {
        //Arrange
        $name = 'Bob';
        $stylist_id = 1;
        $test_client = new Client($id= null, $name, $stylist_id);
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
        $test_client = new Client($id= null, $name, $stylist_id);
        $test_client->save();
        $new_stylist_id = 2;
        $test_client->updateStylistId($new_stylist_id);

        //Act
        $result = $test_client->getStylistId();
        //Assert
        $this->assertEquals($new_stylist_id, $result);

    }

    function test_deleteAll()
    {
        //Arrange
        $name1 = 'Bob';
        $stylist_id1 = 1;
        $test_client1 = new Client($id= null, $name1, $stylist_id1);
        $test_client1->save();
        $name2 = 'Mary';
        $stylist_id2 = 2;
        $test_client2 = new Client($id= null, $name2, $stylist_id2);
        $test_client2->save();

        //Act
        Client::deleteAll();
        $result = Client::getAll();

        //Assert
        $this->assertEquals([], $result);
    }
    function test_deleteOne()
    {
        //Arrange
        $name1 = 'Bob';
        $stylist_id1 = 1;
        $test_client1 = new Client($id= null, $name1, $stylist_id1);
        $test_client1->save();
        $name2 = 'Mary';
        $stylist_id2 = 2;
        $test_client2 = new Client($id= null, $name2, $stylist_id2);
        $test_client2->save();
        $test_client1->deleteOne();

        //Act
        $result = Client::find($test_client1->getId());

        //Assert
        $this->assertEquals(null, $result);
    }


}



?>
