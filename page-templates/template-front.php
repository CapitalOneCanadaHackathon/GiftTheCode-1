<?php

/*Template Name: Donors - frontend */

get_header();

try{

	$host = "localhost";
	$dbname = "Sistering_inventories";
	$user = "root";
	$pass = "root";

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	echo "db connected";
}catch(PDOException $e){
	// echo $e->getMessage();
	die("{'status': '500', 'msg': 'Error connecting to DB', 'data': ".json_encode($e->getMessage())." }");
}

?>

<input type="hidden" value="<?php echo get_template_directory_uri() ?>" id="serverURI">


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Make a promise towards a good cause</h2>
			<p>
				Listed below are list of items in need for donation for Sistering.
			</p>
		</div>
	</div>

	<div class="row margintop4vh">
		<div class="col-md-2">
			<span class="color-text-pink">URGENT NEED</span>
		</div>
		<div class="col-md-2">
			<span class="color-text-green">NORMAL NEED</span>
		</div>
	</div>

<!-- categories posted PHP -->
<div class="flex items-cat-container">
			<?php

				//sql statement
				$sql_items = "SELECT g.id_item, g.name AS item_name, g.priority, gc.id_item_category, gc.name AS cat_name FROM  gtc_items g, gtc_item_categories gc
		      WHERE g.id_item = gc.id_item_category ";

				try{

					//prepare and execute sql statement
					$exe_items = $conn->prepare($sql_items);
					$exe_items->execute();

					// get items
					$get_items = $exe_items->fetchAll(PDO::FETCH_ASSOC);

				}catch(PDOException $e){

					// print exception
					echo $e->getMessage();
				}

				$col = "need"; //want:  green, need: red


				foreach ($get_items as $value) {

					switch ($value['priority']) {
						case 'Low':
							$col = "need";
							break;

						case 'Medium':
							$col = "want";
							break;

						case 'High':
							$col = "need";
							break;

						default:
							$col = "white";
							break;
					}

					// $col = "want";
					echo '
					<div class="items-cat-tiles color-'.$col.'-cat">
							<a class="flex-center" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><h4 class="items-heading">'.$value['cat_name'].'</h4></a>
					</div>
					';
				}

			?>
</div>
<!-- categories end -->


	<!-- categories -->
			<!-- <div class="flex items-cat-container">

				<div class="items-cat-tiles color-need-cat">
						<a class="flex-center" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><h4 class="items-heading">Toiletries</h4></a>
				</div>

				<div class="items-cat-tiles color-need-cat">
					<a href="#" class="flex-center"><h4 class="items-heading">Clothing</h4></a>
				</div>
				<div class="items-cat-tiles color-need-cat">
					<a href="#" class="flex-center"><h4 class="items-heading">Home</h4></a>
				</div>
				<div class="items-cat-tiles color-want-cat">
					<a href="#" class="flex-center"><h4 class="items-heading">Feminine Products</h4></a>
				</div>

			</div> -->


			<!-- items collapse -->
			<div class="row">
				<div class="collapse col-md-12" id="collapseExample2" >
					<div class="panel-body">
						<div class="row items-container">

							<div class="col-md-2 items-tiles alert alert-danger">
								<h4 class="items-heading">TOILET PAPER</h4>
								<button class="color-text-pink color-white">BUY NOW</button>
							</div>

							<div class="col-md-2 items-tiles color-need">
								<h4 class="items-heading">TOILET PAPER</h4>
							</div>
							<div class="col-md-2 items-tiles color-need">
								<h4 class="items-heading">FEMININE PRODUCTS</h4>
							</div>
							<div class="col-md-2 items-tiles color-need">
								<h4 class="items-heading">FACE WASH</h4>
							</div>
							<div class="col-md-2 items-tiles color-need">
								<h4 class="items-heading">TOOTHPASTE</h4>
							</div>
							<div class="col-md-2 items-tiles color-want">
								<h4 class="items-heading">SHAMPOO</h4>
							</div>
							<div class="col-md-2 items-tiles color-want">
								<h4 class="items-heading">TOILET PAPER</h4>
							</div>
							<div class="col-md-2 items-tiles color-want">
								<h4 class="items-heading">TOILET PAPER</h4>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 items-cat-tiles color-need">
					<a href="#" class="flex-center"><h4 class="items-heading">First Aid</h4></a>
				</div>
				<div class="col-md-3 items-cat-tiles color-want">
					<a href="#" class="flex-center"><h4 class="items-heading">Food</h4></a>
				</div>
				<div class="col-md-3 items-cat-tiles color-want">
					<a href="#" class="flex-center"><h4 class="items-heading">Miscellaneous</h4></a>
				</div>
			</div>

</div>
