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

    }
?>
