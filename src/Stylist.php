
<?php
class Stylist
{
    private $id;
    private $stylist_name;
    function __construct($id = null, $stylist_name)
    {
        $this->id           = $id;
        $this->stylist_name = $stylist_name;
    }

    function getId()
    {
        return $this->id;
    }

    function getStylistName()
    {
        return $this->stylist_name;
    }

    function setStylistName($stylist_name)
    {
        $this->stylist_name = $stylist_name;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getName()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }


}

?>
