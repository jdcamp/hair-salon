<?php
    class Client
    {
        private $id;
        private $client_name;
        private $stylist_id;

        function __construct($id=null, $client_name, $stylist_id)
        {
            $this->id = $id;
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setClientName($client_name)
        {
            $this->client_name = $client_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }
        function setStylistId($stylist_id)
        {
            $this->stylist_id = $stylist_id;
        }
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO client (name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylistId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_client = $GLOBALS['DB']->query("SELECT * FROM client;");
            $clients         = array();
            foreach ($returned_client as $client) {
                $id           = (int)$client['id'];
                $client_name  = $client['name'];
                $stylist_id   = (int)$client['stylist_id'];
                $new_client   = new Client($id, $client_name, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE client SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setClientName($new_name);
        }
        function updateStylistId($new_stylist_id)
        {
            $GLOBALS['DB']->exec("UPDATE stylist SET stylist_id = {$new_stylist_id} WHERE id = {$this->getId()};");
            $this->setStylistId($new_stylist_id);
        }

        function deleteOne()
        {
            $GLOBALS['DB']->exec("DELETE FROM client WHERE id = {$this->getId()};");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }

        static function find($search_id)
        {
            $clients = Client::getAll();
            foreach ($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    return $client;
                }
            }
            return null;
        }



    }
?>
