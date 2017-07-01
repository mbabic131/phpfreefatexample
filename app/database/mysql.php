<?php
namespace Database;

use DB\SQL;

class Mysql {

    public $conn;

    private $host;
    private $port;
    private $db_name;
    private $user;
    private $pass;

    public function __construct(\Base $f3)
    {
        $this->host = $f3->get("database_host");
        $this->port = $f3->get("database_port");
        $this->db_name = $f3->get("database_name");
        $this->user = $f3->get("database_user");
        $this->pass = $f3->get("database_pass");

        $this->conn = new SQL(
            'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name,
            $this->user,
            $this->pass
        );
    }

}