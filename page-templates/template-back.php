<?php

/*Template Name: Volunteers - backend */

get_header();
?>

<div class="container marginbottom-large">
	<div class="row">
		<div class="col-md-7">
			<h2>Lorem Ipsum</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>

	<div class="row marginbottom-med">
		<div class="col-md-12 items-cat-container" id="inventory-filter">
			<button>all</button>
			<button>clothing</button>
			<button>toiletries</button>
			<button>home</button>
			<button>feminine products</button>
			<button>first aid</button>
			<button>food</button>
			<button>misc.</button>
			<input type="search" placeholder="search something...">
		</div>
	</div>

<?php
	try{

		$host = "localhost";
		$dbname = "sistering_inventories";
		$user = "root";
		$pass = "root";

		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		//echo "db connected";
	}catch(PDOException $e){
		// echo $e->getMessage();
		die("{'status': '500', 'msg': 'Error connecting to DB', 'data': ".json_encode($e->getMessage())." }");
	}

	//sql statement
	$sql_items = "SELECT c.name AS category_name, i.name, i.size, i.priority, i.requested, i.memo
								FROM  gtc_items i, gtc_item_categories c
								WHERE i.id_item_category = c.id_item_category";

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
// print_r($get_items);
?>

<?php

$id = 0;
foreach ($get_items as $value) {
$id++; ?>
	<div class="row inventory-item-container">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12 inventory-item-label" data-toggle="collapse" href="#collapseExample<?php  echo $id; ?>" aria-expanded="false" aria-controls="collapseExample"><?php echo strtoupper($value['name'])." "; ?><?php if(isset($value['size'])){ echo "  size ".$value['size'];} ?></div>
			</div>
			<div class="row">
				<div class="col-md-12 inventory-item-details collapse" id="collapseExample<?php  echo $id; ?>">
					<?php echo strtoupper($value['category_name']); ?><br>
					<?php echo "Priority Level: ". $value['priority']; ?><br>
					<?php if(isset($value['requested']) && $value['requested'] == 1){ echo "Item Requested";} ?>
				  <?php if(isset($value['memo'])){ echo $value['memo'];} ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="flex">
				<button class="color-need">URGENT NEED</button>
				<button class="color-want">NEED</button>
				<button>NO NEED</button>
			</div>
		</div>
	</div>
<?php
}
 ?>

</div>
