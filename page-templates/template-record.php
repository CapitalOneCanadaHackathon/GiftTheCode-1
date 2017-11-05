<?php

/*Template Name: Record - backend */

get_header();

try{

	$host = "localhost";
	$dbname = "sistering_inventories";
	$user = "root";
	$pass = "";

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	//echo "db connected";
}catch(PDOException $e){
	// echo $e->getMessage();
	die("{'status': '500', 'msg': 'Error connecting to DB', 'data': ".json_encode($e->getMessage())." }");
}

?>

<div class="container marginbottom-large">
	<div class="row">
		<div class="col-md-7">
			<h2>Record</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>
</div>

<?php
	//sql statement
	$sql_items = "SELECT t.time, v.name AS volunteer_name, i.name AS item_name, t.priority, t.memo, t.description AS action
								FROM  gtc_items_timestamp t, gtc_items i, gtc_volunteers v
								WHERE t.id_volunteer = v.id_volunteer
								AND t.id_item = i.id_item
								ORDER BY t.time DESC";

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
?>

 <div class="container">

	 <div class="row">
		 <div class="col">
			 <h4>Inventory History</h4>
		 </div>
	 </div>

	 <div class="row">
		 <div class="col-sm-2">Date</div>
		 <div class="col-sm-2">Volunteer</div>
		 <div class="col-sm-2">Item</div>
		 <div class="col-sm-1">Priority</div>
		 <div class="col-sm-4">Memo</div>
		 <div class="col-sm-1">Action</div>
	 </div>

	 <?php
	 foreach ($get_items as $value) { ?>
		 <div class="row">
			<div class="col-sm-2"><?php echo $value['time'] ?></div>
			<div class="col-sm-2"><?php echo $value['volunteer_name']; ?></div>
			<div class="col-sm-2"><?php echo $value['item_name']; ?></div>
			<div class="col-sm-1"><?php echo $value['priority'] ?></div>
			<div class="col-sm-4"><?php echo $value['memo'] ?></div>
			<div class="col-sm-1"><?php echo $value['action'] ?></div>
		</div>
	<?php
	 }
	  ?>
 </div>

<br>

 <div class="container">

	 <div class="row">
		 <div class="col">
			 <h4>High Priority Items</h4>
		 </div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Item</div>
		 <div class="col-sm-3">Average per Month</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Socks size sm</div>
		 <div class="col-sm-3">32%</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Toilet tissue</div>
		 <div class="col-sm-3">24%</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Winter Jacket size md</div>
		 <div class="col-sm-3">20%</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Winter Boots size 7.5</div>
		 <div class="col-sm-3">11%</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Bedding</div>
		 <div class="col-sm-3">10%</div>
	 </div>
	 <div class="row">
		 <div class="col-sm-3">Bath Towels</div>
		 <div class="col-sm-3">3%</div>
	 </div>
 </div>
