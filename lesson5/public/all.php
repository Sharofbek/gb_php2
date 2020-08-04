<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
use App\Db;


$conn = new Db;

$products = $conn->query("SELECT * FROM products LIMIT 10000")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>all</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
</head>
<body>
	<div class="container">
		<div class="products">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Catalog_Id</th>
			    </tr>
			  </thead>
			  <tbody id="products-list">
				<?php foreach($products as $product):?>
					<tr>
						<td><?= $product['id']?></td>
						<td><?= $product['name']?></td>
						<td><?= $product['price']?></td>
						<td><?= $product['catalog_id']?></td>
					</tr>
				<?php endforeach;?>
			  </tbody>
			</table>
		<div>
	</div>
</body>
</html>



