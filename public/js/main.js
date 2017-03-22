$(document).ready(function(){

  // add new form fields

  var maxField = 10; //Input fields increment limitation

  var fieldHTML = '<div class="field">' +
                  '<a href="javascript:void(0);" class="remove_button"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a>' +
                  '<select class="form-control">' +
                  '<option value="select">select</option>';

  var x = 1; //Initial field counter is 1

/*
  $(addButton).click(function(){ //Once add button is clicked
      if(x < maxField){ //Check maximum number of input fields
          x++; //Increment field counter
          $(director).append(fieldHTML); // Add field html
      }
  });
*/

// Add director field

  $('.director').on('click', '.add_button', function(e) { //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter
    }
/*      $.ajax({
        method: 'GET',
        url: '../../includes/get_directors.php'
        }).done.(function(data){

        var result = $.parseJSON(data);

        $.each(result, function(key, value){
        fieldHTML += '<option>' + value['FirstName'] + value['LastName'] + '</option>';
        });
      });
*/
    fieldHTML += '</select></div>';
    $(this).parent('div').append(fieldHTML); // Add field html

  });

  $('.director').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });

// Add producer field

  $('.producer').on('click', '.add_button', function(e) { //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter

      fieldHTML += '</select></div>';

      $(this).parent('div').append(fieldHTML); // Add field html
    }
  });

  $('.producer').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });

// Add actor field

  $('.actor').on('click', '.add_button', function(e) { //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter

      fieldHTML += '</select></div>';

      $(this).parent('div').append(fieldHTML); // Add field html
    }
  });

  $('.actor').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });


















  // Date Picker

  $(function() {
    $( "#releasedate" ).datepicker();
  });


});
