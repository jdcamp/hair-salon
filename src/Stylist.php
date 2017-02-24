
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
        $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getStylistName()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }
    static function getAll()
    {
        $returned_stylist = $GLOBALS['DB']->query("SELECT * FROM stylist;");
        $stylists = array();
        foreach ($returned_stylist as $stylist) {
            $stylist_name = $stylist['name'];
            $id = $stylist['id'];
            $new_stylist = new Stylist($id, $stylist_name);
            array_push($stylists, $new_stylist);
        }
        return $stylists;
    }

    static function deleteAll()
{
    $GLOBALS['DB']->exec("DELETE FROM stylist;");
}




}

?>
