<?php 

/*Template Name: Donors - frontend */

get_header();
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Lorem Ipsum</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-md-12 items-cat-container">
			<input type="search" placeholder="search something...">
		</div>
	</div>-->
	<div class="row margintop4vh">
		<div class="col-md-2">
			<span class="color-text-pink">URGENT NEED</span>
		</div>
		<div class="col-md-2">
			<span class="color-text-green">NORMAL NEED</span>
		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-body">
			<div class="panel-heading" data-toggle="collapse" href="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">CATEGORIES</div>
		</div>
	</div>
	<div class="collapse in panel" id="collapseCategories">
		<div class="panel-body">

			<div class="row items-container">
				<div class="col-md-3 items-tiles color-need">
					<h4 class="items-heading">TOILET PAPER</h4>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/icons/ios_application_placeholder_white.svg'; ?>">
					<button class="color-text-pink color-white">BUY NOW</button>
				</div>
				<div class="col-md-3 items-tiles color-need">
					<h4 class="items-heading">TOILET PAPER</h4>
				</div>
				<div class="col-md-3 items-tiles color-need">
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
				</div>
			</div>

			
		</div>
	</div>

			<div class="row items-container">

				<div class="col-md-3 items-cat-tiles color-need">
					<div>
						<a class="flex-center" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><h4 class="items-heading">Toiletries</h4></a>
					</div>
					
				</div>

				<div class="col-md-3 items-cat-tiles color-need">
					<a href="#" class="flex-center"><h4 class="items-heading">Clothing</h4></a>
				</div>
				<div class="col-md-3 items-cat-tiles color-need">
					<a href="#" class="flex-center"><h4 class="items-heading">Home</h4></a>
				</div>
				<div class="col-md-3 items-cat-tiles color-need">
					<a href="#" class="flex-center"><h4 class="items-heading">Feminine Products</h4></a>
				</div>

			</div>

			<div class="row">

				<div class="collapse col-md-12" id="collapseExample2" style="height:500px">
						+ details<br>
						+ details<br>
						+ details
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