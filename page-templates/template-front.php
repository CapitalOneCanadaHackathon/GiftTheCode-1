<?php

/*Template Name: Donors - frontend */

get_header();

try{

	$host = "localhost";
	$dbname = "sistering_inventories";
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
		<div class="col-md-2">
			<span class="color-text-blue">STOCK OK</span>
		</div>
	</div>

<!-- categories posted PHP -->

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
				$count = 0;
				$i = 0;
				$collapse = 0;

				echo '<div class="flex items-cat-container">';

				foreach ($get_items as $value) {

					if($count == 3 ){
						echo "
						</div>
						";
						echo '<div class="row">
								<div class="collapse col-md-12" id="collapseExample'.$collapse.'" >
									<div class="panel-body">
										<div class="row items-container" id="appendHere">


											</div>
									</div>
								</div>
							</div>';

						echo"
						<div class='flex items-cat-container'>
						";
						$count = 0;
						$collapse++;
					}

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

					//$col = "want";
					echo '
					<div id="cat-'.$value['cat_name'].'" class="items-cat-tiles color-'.$col.'-cat">
							<button value="'.$value['id_item_category'].'" class="flex-center" data-toggle="collapse" onclick="getItemsInfo(event, this, '.$collapse.' )" href="#collapseExample'.$collapse.'" aria-expanded="false" aria-controls="collapseExample'.$collapse.'"><h4 class="items-heading">'.$value['cat_name'].'</h4></button>
					</div>
					';

					$count ++;
					$i++;
					if ($i == count($get_items) ){
						echo '</div>';
						echo '<div class="row">
								<div class="collapse col-md-12" id="collapseExample'.$collapse.'" >
									<div class="panel-body">
										<div class="row items-container" id="appendHere">


											</div>
									</div>
								</div>
							</div>';
					}

				}

			?>
<!-- categories end -->

<div id="category-clothing"></div>
<div id="category-toiletries"></div>
<div id="category-home"></div>
<div id="category-feminine"></div>
<div id="category-firstaid"></div>
<div id="category-food"></div>
<div id="category-misc"></div>

<!-- listing and displaying sample item data -->

<?php

	$svgname = $value['item_name'];
	$SVGpath='template-parts/graphics/' . $svgname;
	/* set $SVGNAME to whatever name is echoed in querie */

?>

<div style="display: none" class="col-md-2 items-tiles ">
	<h4 class="items-heading">STATIC PAPER</h4>
	<!--<img src="<?php //echo get_template_directory_uri(); ?>/assets/images/icons/T-Shirt-icon.svg">-->
	<?php get_template_part($SVGpath)?>
	<button class="cta-btn">BUY NOW</button>
</div>

<!-- Hidden element used for cloning  -->
<div style="display: none" id="staticColl"  data-category="" class="col-md-2 items-tiles">
	<h4 class="items-heading"><?php echo $svgname;?></h4>
	<!-- Empty to div to enter svg -->
	<div class="svg_loc" >

	</div>
	<button class="cta-btn">BUY NOW</button>
</div>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "Sistering_inventories");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM gtc_items";

try{
	$exe_all_items = $conn-> prepare($sql);
	$exe_all_items -> execute();

	$get_all_items = $exe_all_items->fetchAll(PDO::FETCH_ASSOC);
	// echo "Print res";
	// print_r($get_all_items);

}catch(PDOException $e){
	echo $e->getMessage();
}

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)):

        	$svgname = $row['name'];
			$SVGpath='template-parts/graphics/' . $svgname;
			$priority = $row['priority'];
			$priorityclass;
			$itemcategory = $row['id_item_category'];
			$btnCTA;
			$visibility;

			if( $priority == 'High' ){

				$priorityclass = 'color-need';
				$visibility = 'block';

			}

			if( $priority == 'Medium' ){

				$priorityclass = 'color-want';
				$visibility = 'none';


			}

			if( $priority == 'Low' ){

				$priorityclass = 'color-white';
				$visibility = 'none';

			}


			/* set $SVGNAME to whatever name is echoed in querie */ ?>


        	<!-- <div data-category="<?php echo $itemcategory;?>" class="col-md-2 items-tiles <?php echo $priorityclass . '  ' . $itemcategory . '-child'; ?>"> -->
				<!-- <h4 class="items-heading"><?php echo $svgname;?></h4> -->
				<!-- <?php get_template_part($SVGpath)?> -->
				<!-- <button class="cta-btn" style="display:<?php echo $visibility;?>">BUY NOW</button> -->
			<!-- </div>  -->



        <?php


   		endwhile;

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>


</div>
