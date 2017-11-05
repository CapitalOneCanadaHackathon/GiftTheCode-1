$( document ).ready(function() {
    console.log( "ready!" );


   $( ".1-child" ).each(function() {
  		$('#category-clothing').append($('.1-child'));
	});

    $( ".2-child" ).each(function() {
  		$('#category-toiletries').append($('.2-child'));
	});

	$( ".3-child" ).each(function() {
  		$('#category-home').append($('.3-child'));
	});

	$( ".4-child" ).each(function() {
  		$('#category-feminine').append($('.4-child'));
	});

	$( ".5-child" ).each(function() {
  		$('#category-firstaid').append($('.5-child'));
	});

	$( ".6-child" ).each(function() {
  		$('#category-food').append($('.6-child'));
	});

	$( ".7-child" ).each(function() {
  		$('#category-misc').append($('.7-child'));
	});


});


