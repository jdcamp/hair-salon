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
    }
    function test_getStylistName()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist = new Stylist($id, $name);

        //Act
        $result = $test_stylist->getStylistName();

        //Assert
        $this->assertEquals($name, $result);
    }
    function test_setStylistName()
    {
        //Arrange
        $name = 'Bob';
        $test_stylist = new Stylist($id, $name);
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
        $test_stylist = new Stylist($id, $name);

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
        $test_stylist = new Stylist($id, $name);
        $test_stylist->save();

        //Act
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals($test_stylist, $result[0]);

    }
}


 ?>
