<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
use App\Db;
use App\Helper;
$x = (new Helper)->getProductsApi();

if($x['ok']){
	die();
}
// echo "HELLO";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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

			  </tbody>
			</table>
		<div>
		<button id="button" class="btn btn-primary" >Get</button>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		let start = 0;
		let counter = 1;
		$( document ).ready(function() {
			let yat = `http://php2.lo/public/index.php?action=getProducts&start=${start}&limit=25`;
			$.get(yat, function( data ) {
				makeMeTrs(data);
			});

			$('#button').on('click', function(){
		    	let yat = `http://php2.lo/public/index.php?action=getProducts&start=${start}&limit=25`;
				$.get(yat, function( data ) {
					makeMeTrs(data);
				});
			});
		});
		function makeMeTrs(data){
			let result = JSON.parse(data)['result'];
			let trs = "";
			for (var i = 0; i < result.length; i++) {
				trs += "<tr>";
			trs += `<td>${counter++}</td>`;
				trs += `<td>${result[i]['name']}</td>`;
				trs += `<td>${result[i]['price']}</td>`;
				trs += `<td>${result[i]['catalog_id']}</td>`;
				trs += "</tr>";
			}
			$( "#products-list" ).append(trs);

			start +=25;
		}
	</script>
</body>
</html>
