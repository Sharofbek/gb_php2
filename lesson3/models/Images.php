<?php
namespace Core;
class Images
{
	private $conn;
	public function __construct(\PDO $conn)
	{
		$this->conn = $conn;
	}
	public function getAllImages(){
		$res = $this->conn->query("SELECT * FROM images");
		return $res->fetchAll();
	}

	public function getImage(int $id){
		$res = $this->conn->query("SELECT * FROM images WHERE id = $id");
		return $res->fetch();
	}

}