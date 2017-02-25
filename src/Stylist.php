
<?php
class Stylist

{
	private $id;
	private $stylist_name;
	function __construct($id = null, $stylist_name)
	{
		$this->id = $id;
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
		$GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getStylistName() }')");
		$this->id = $GLOBALS['DB']->lastInsertId();
	}
	static function getAll()
	{
		$returned_stylist = $GLOBALS['DB']->query("SELECT * FROM stylist;");
		$stylists = array();
		foreach($returned_stylist as $stylist)
		{
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
	static function find($search_id)
	{
		$stylists = Stylist::getAll();
		foreach($stylists as $stylist)
		{
			$stylist_id = $stylist->getId();
			if ($stylist_id == $search_id)
			{
				return $stylist;
			}
		}
		return null;
	}
	function deleteOne()
	{
		$GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId() };");
		$GLOBALS['DB']->exec("DELETE FROM client WHERE stylist_id = {$this->getId() };");
	}
	function update($new_name)
	{
		$GLOBALS['DB']->exec("UPDATE stylist SET name = '{$new_name}' WHERE id = {$this->getId() };");
		$this->setStylistName($new_name);
	}
	function getClients()
	{
		$clients = array();
		$found_clients = $GLOBALS['DB']->query("SELECT * FROM client WHERE stylist_id = {$this->getId() };");
		foreach($found_clients as $client)
		{
			$client_id = $client['id'];
			$name = $client['name'];
			$stylist_id = $client['stylist_id'];
			$new_client = new Client($client_id, $name, $stylist_id);
			array_push($clients, $new_client);
		}
		return $clients;
	}
}
?>
