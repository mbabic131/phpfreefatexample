<?php
namespace Controller;

use Database\Mysql;

class Beer {
    private $db;

    public function __construct(\Base $f3)
    {
        $this->db = new Mysql($f3);
    }

    function list(\Base $f3, $params)
    {
        // get global varibale
        echo "App: " . $f3->get('APP_NAME') . "<br><br>";

        // check if global varibale exists
        if($f3->exists('OWNER')) {
            echo "App owner: " . $f3->get('OWNER') . "<br>";
            echo "App version: " . $f3->get('APP_VERSION') . "<br><br>";
        }
        
        $beers = $this->db->conn->exec('SELECT * FROM beers');
        $f3->set('beers', $beers);

        echo \Template::instance()->render('app/views/beers.html');
    }

    function getBeer(\Base $f3, $params)
    {
        $beer_sql = $this->db->conn->exec(
            'SELECT * FROM beers WHERE id = ?',
            $params['id']
        );

        // With ORM
        $beer_orm = new \DB\SQL\Mapper($this->db->conn, 'beers');
        $beer_orm->load(array('id=?', $params['id']));

        $f3->set('beer', $beer_sql[0]);
        $f3->set('beerModel', $beer_orm);

        echo \Template::instance()->render('app/views/beer.html');
    }

    function newBeer(\Base $f3) 
    {
        echo \Template::instance()->render('app/views/newBeer.html');
    }

    function storeBeer(\Base $f3, $params)
    {
        $beer = new \DB\SQL\Mapper($this->db->conn, 'beers');
        $beer->name = $f3->get('POST.name');
        $beer->type = $f3->get('POST.type');
        $beer->save();

        echo "Successfully saved.";
    }
}