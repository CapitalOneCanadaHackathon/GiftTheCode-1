function getItemsInfo(e , elem){
  //prevent defualt action
  e.preventDefault();

  var elem = $(elem);
  var serverURI = $("#serverURI").val();
  console.log(elem);
  var data = "name=saeed&category=lame";
  // return;
  //ajax request
  $.ajax({
    url: serverURI+"/server/get.php",
    method: "POST",
    data: data,
    success: function(data){
      // alert(data);
      console.log(data);
    },
    error: function(data){
      console.log(data);
    }
  });

}
