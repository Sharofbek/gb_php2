<?php 
namespace App;
use App\Db;
use Faker\Factory;
class Dumper
{
	private $conn;
	function __construct(){
		$this->conn = new Db;
		$faker = \Faker\Factory::create('ru_RU');
		for ($i=0; $i < 10000; $i++) {
			$name = ucfirst(implode(" ",$faker->words(rand(2,3))));
			$price = rand(100,10000);
			$catalog_id = rand(1,100);
			$sql = "INSERT INTO products (name, price, catalog_id) VALUES (\"{$name}\",\"{$price}\",\"{$catalog_id}\")";
			$x = $this->conn->query($sql);
		}
	}
}
