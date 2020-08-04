<?php
namespace App;

use App\Db;

class Helper
{
	private $env;
	private $conn;
	function __construct()
	{
		$this->env = parse_ini_file("../.config");
	}


	public function env($index, $default = NULL){
		return $this->env[$index] ?? $defualt;  
	}


	public function getProductsApi(){
		if(isset($_GET['action']) && $_GET['action'] === 'getProducts'){
			if(
				isset($_GET['start']) 
				// && is_numeric($_GET['start'])
				// && is_integer($_GET['start']) 
				&& isset($_GET['limit'])
				// && is_numeric($_GET['limit']) 
				// && is_integer($_GET['limit'])
			){
				$this->connectDb();
				$start = $_GET['start'];
				$limit = $_GET['limit'];
				$sql = "SELECT * FROM products LIMIT $start, $limit";
				try {
					$res = $this->conn->query($sql);
				} catch (\PDOException $e) {
					echo $e->getMessage();
				}
				if($res){
					echo json_encode(['result'=>$res->fetchAll()],true);
					return ['ok'=>true];
				}else {
					return ['ok'=>false, 'result'=>[] ];
				}
			}else {
				// echo "FAILED";
				return ['ok'=>false,  'result'=>[]];
			}
		}else {
			// var_dump($_GET);
			return ['ok'=>false,  'result'=>[]];
		}
	}

	private function connectDb(){
		$this->conn = new Db;
	}

}