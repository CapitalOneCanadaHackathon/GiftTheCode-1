function getItemsInfo(e , elem){



  //prevent defualt action
  e.preventDefault();

  var elem = $(elem);
  var serverURI = $("#serverURI").val();
  var modalBody = $("#itemsModalBody");

  console.log(elem);
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

        //get access to tbody
        var tbody = modalBody.find("table > tbody");

        //empty the tbody if data found
        if(tbody.children().length > 0){
          tbody.html("");
        }

        //if the data response length is zero return empty
        if(data.data.length == 0){
          return;
        }

        //if results are found create a <tr> and <td> tag and populate the data and append
        for(var i = 0; i < data.data.length; i ++){

          //create elements
          var tr = $(document.createElement('tr') );
          var td = $(document.createElement('td') ); //contains 'name'
          var td_two = $(document.createElement('td') ); //contains 'priority'

          
          switch (data.data[i].priority) {
            case 'Low':
              tr.addClass("success");
              break;

            case 'Medium':
              tr.addClass("info");
              break;

            case 'High':
              tr.addClass("danger");
              break;
            default:
              tr.addClass("default");
          }


          //attach the elements in <td>
          td.html(data.data[i].name);
          td_two.html(data.data[i].priority);

          //append the <td> in <tr>
          tr.append(td);
          tr.append(td_two);

          //append the <tr> to <tbody>
          tbody.append(tr);
        }
      }

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
