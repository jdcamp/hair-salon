<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class StylistTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Stylist::deleteAll();
        Client::deleteAll();
    }
    function test_getStylistName()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist = new Stylist($id=null, $name);

        //Act
        $result = $test_stylist->getStylistName();

        //Assert
        $this->assertEquals($name, $result);
    }
    function test_setStylistName()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist = new Stylist($id=null, $name);
        $new_name = "Robert";

        //Act
        $test_stylist->setStylistName($new_name);
        $result = $test_stylist->getStylistName();

        //Assert
        $this->assertEquals($new_name, $result);
    }

    function test_getId()
    {
        //Arrange
        $name = 'Bob';
        $id = 1;
        $test_stylist = new Stylist($id=null, $name);

        //Act
        $result = $test_stylist->getId();

        //Assert
        $this->assertEquals($id, $result);
    }

    function test_save()
    {
        //Arrange
        $name = 'Bob';
        $id = $GLOBALS['DB']->lastInsertId();
        $test_stylist = new Stylist($id=null, $name);
        $test_stylist->save();

        //Act
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals($test_stylist, $result[0]);

    }

    function test_deleteAll()
    {
        //Arrange
        $name1 = 'Bob';
        $test_stylist1 = new Stylist($id=null, $name1);
        $test_stylist1->save();
        $name2 = 'Mary';
        $test_stylist2 = new Stylist($id=null, $name2);
        $test_stylist2->save();

        //Act
        Stylist::deleteAll();
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([], $result);
    }
    function test_find()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist1 = new Stylist($id=null, $name);
        $test_stylist1->save();
        $name2 = 'Mary';
        $id2 = $GLOBALS['DB']->lastInsertId()+1;
        $test_stylist2 = new Stylist($id2, $name2);
        $test_stylist2->save();

        //Act
        $result = Stylist::find($test_stylist1->getId());
        //Assert
        $this->assertEquals($test_stylist1, $result);
    }

    function test_update()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist = new Stylist($id=null, $name);
        $test_stylist->save();
        $new_name = 'Robert';
        $test_stylist->update($new_name);

        //Act
        $result = $test_stylist->getStylistName();
        //Assert
        $this->assertEquals("Robert", $result);

    }

    function test_deleteOne()
    {
        //Arrange
        $name1 = 'Bob';
        $test_stylist1 = new Stylist($id=null, $name1);
        $test_stylist1->save();
        $name2 = 'Mary';
        $test_stylist2 = new Stylist($id=null, $name2);
        $test_stylist2->save();
        $test_stylist1->deleteOne();

        //Act
        $result = Stylist::find($test_stylist1->getId());

        //Assert
        $this->assertEquals(null, $result);
    }
}


 ?>
