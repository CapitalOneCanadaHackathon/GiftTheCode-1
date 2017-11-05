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

<input type="hidden" value="<?php echo get_template_directory() ?>" id="serverURI">


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Make a promise towards a good cause</h2>
			<p>
				Listed below are list of items in need for donation for Sistering.
			</p>
			<?php

		 ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 items-cat-container">
			<button>all</button>
			<button>food</button>
			<button>toiletries</button>
			<button>clothing</button>
			<button>electronics</button>
			<input type="search" placeholder="search something...">
		</div>
	</div>
	<div class="row margintop2vh">
		<div class="col-md-2">
			<span class="color-text-pink">URGENT NEED</span>
		</div>
		<div class="col-md-2">
			<span class="color-text-green">NORMAL NEED</span>
		</div>
	</div>

	<div class="row items-container">


		<div class="col-md-3 items-tiles color-need">
			<h4 class="items-heading">TOILET PAPER</h4>
			<img src="<?php echo get_template_directory_uri() . '/assets/images/icons/ios_application_placeholder_white.svg'; ?>">
			<button class="color-text-pink color-white">BUY NOW</button>
		</div>

		<!-- Items -->
		<!-- <div class="col-md-3 items-tiles color-need"> -->
			<!-- <h4 class="items-heading">TOILET PAPER</h4> -->
			<?php

				//sql statement
				$sql_items = "SELECT * FROM gtc_item_categories";

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

				foreach ($get_items as $value) {
					echo '
					<div class="col-md-3 items-tiles color-need">
						<h4 class="items-heading">'.$value['name'].'</h4>
						<button onclick="getItemsInfo(event, this)" data-toggle="modal" data-target="#itemsInfo" class="btn btn-primary"  >Get Item Info</button>
					</div>
					';
				}

			?>

		<!-- </div> -->


		<!-- <div class="col-md-3 items-tiles color-need">
			<h4 class="items-heading">FEMININE PRODUCTS</h4>
		</div>
		<div class="col-md-3 items-tiles color-need">
			<h4 class="items-heading">FACE WASH</h4>
		</div>
		<div class="col-md-3 items-tiles color-need">
			<h4 class="items-heading">TOOTHPASTE</h4>
		</div>
		<div class="col-md-3 items-tiles color-want">
			<h4 class="items-heading">SHAMPOO</h4>
		</div>
		<div class="col-md-3 items-tiles color-want">
			<h4 class="items-heading">TOILET PAPER</h4>
		</div>
		<div class="col-md-3 items-tiles color-want">
			<h4 class="items-heading">TOILET PAPER</h4>
		</div>-->
		<div class="col-md-3 items-tiles color-want">
			<h4 class="items-heading">TOILET PAPER</h4>
		</div>
	</div>
</div>


<!-- MODALS -->

<!-- Modal -->
<div id="itemsInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body" id="itemsModalBody">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
