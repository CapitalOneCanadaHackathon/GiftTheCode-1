function getItemsInfo(e , elem, collpaseIndex){

  var col_index = collpaseIndex;
  //prevent defualt action
  e.preventDefault();

  var collapseId = $("#collapseExample"+col_index);
  var containerCol = collapseId.find("div > div");

  console.log(containerCol);

  var elem = $(elem);
  var serverURI = $("#serverURI").val();

  console.log("category = "+elem.val());
  var data = "category="+elem.val();

  $.ajax({

    url: serverURI+"/server/get.php",
    method: "POST",
    data: data,
    success: function(data){

      //parse data received as JSON
      if(isJSON(data)){

        //parse response data as JSON
        var data = JSON.parse(data);

        //if the data response length is zero return empty
        if(data.data.length == 0){
          console.log(data);
          return;
        }

        console.log($("#staticColl"));

        //if results are found create a <tr> and <td> tag and populate the data and append
        for(var i = 0; i < data.data.length; i ++){



          switch (data.data[i].priority) {
            case 'Low':
              // tr.addClass("success");
              break;

            case 'Medium':
              // tr.addClass("info");
              break;

            case 'High':
              // tr.addClass("danger");
              break;
            default:
              // tr.addClass("default");
          }

         var cloneDiv = $("#staticColl").clone();
          console.log(cloneDiv);
          cloneDiv.find("h4").html(data.data[i].item_name);
          cloneDiv.show();
          // cloneDiv.appendTo(containerCol[0]);
          cloneDiv.appendTo($("#appendHere"));
          $("#appendHere").html("");
          $("#appendHere").append(cloneDiv);


        }

      }
console.log(data);
    },
    error: function(data){
      console.log(data);
    }
  });

}

//function to test data is JSON. < Returns boolean >
function isJSON(data){
  try{
    JSON.parse(data);
  }catch(err){
    console.log("Something went wrong parsinng");
    return false;
  }
  return true;
}
