$(document).ready(function(){

  // add new form fields

  var maxField = 10; //Input fields increment limitation

  var fieldHTML = "<div class='field'>" +
                  "<a class='remove_button'>" +
                  "<span class='glyphicon glyphicon-minus-sign' aria-hidden='true'></span></a>" +
                  "<select class='form-control'>" +
                  "<option value=''>select</option>";

  var fieldHTMLReset = "<div class='field'>" +
                       "<a class='remove_button'>" +
                       "<span class='glyphicon glyphicon-minus-sign' aria-hidden='true'></span></a>" +
                       "<select class='form-control'>" +
                       "<option value=''>select</option>";

  var d = 1; //Initial field counter is 1
  var p = 1;
  var a = 1;

  var table = "";

/*
  $(addButton).click(function(){ //Once add button is clicked
      if(x < maxField){ //Check maximum number of input fields
          x++; //Increment field counter
          $(director).append(fieldHTML); // Add field html
      }
  });
*/

function getAjax(table){
$.ajax({   
        type: "GET",   
        url: "js/test.php",   
        data: {name: table},
        success: function(response){
          var result = JSON.parse(response);
          $.each( result, function( key, value ) {
            fieldHTML += "<option>" + result[value] + "</option>";
            $(this).parent('div').append(fieldHTML); // Add field html 
          } 
         },
         dataType: "json"});
         var result = JSON.Parse(data);
});
}

// Add director field

  $('.director').on('click', '.add_button', function(e) { //Once add button is clicked
    if(d < maxField){ //Check maximum number of input fields
      d++; //Increment field counter
      getAjax('directors');
      fieldHTML += "</select></div>";
      $(this).parent('div').append(fieldHTML); // Add field html
      fieldHTML = fieldHTMLReset;
    }
  });

  $('.director').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      d--; //Decrement field counter
  });

// Add producer field

  $('.producer').on('click', '.add_button', function(e) { //Once add button is clicked
    if(p < maxField){ //Check maximum number of input fields
      p++; //Increment field counter

      getAjax('producers');

      fieldHTML += "</select></div>";

      $(this).parent('div').append(fieldHTML); // Add field html

      fieldHTML = fieldHTMLReset;
    }
  });

  $('.producer').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      p--; //Decrement field counter
  });

// Add actor field

  $('.actor').on('click', '.add_button', function(e) { //Once add button is clicked
    if(a < maxField){ //Check maximum number of input fields
      a++; //Increment field counter

      getAjax('actors');

      fieldHTML += "</select></div>";

      $(this).parent('div').append(fieldHTML); // Add field html

      fieldHTML = fieldHTMLReset;
    }
  });

  $('.actor').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      a--; //Decrement field counter
  });



  // Date Picker

  $(function() {
    $( "#releasedate" ).datepicker();
  });


});
