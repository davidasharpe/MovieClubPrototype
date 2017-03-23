$(document).ready(function(){

  // add new form fields

  var maxField = 10; //Input fields increment limitation

  var fieldHTML = '<div class="field">' +
                  '<a href="javascript:void(0);" class="remove_button">' + 
                  'span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a>';
  
  var directors[];
  var producers[];
  var actors[];
  
  var d = 1; //Initial field counter is 1
  var p = 1;
  var a = 1;

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
    if(d < maxField){ //Check maximum number of input fields
      d++; //Increment field counter
      fieldHTML += '<select class="form-control" name="' + directors[d] +'">' +                
                   '<option value="">select</option>';
      
        $.ajax({
        method: 'GET',
        url: '../../includes/get_directors.php'
        }).done.(function(data){

        var result = $.parseJSON(data);

        $.each(result, function(key, value){
        fieldHTML += '<option>' + value['FirstName'] + value['LastName'] + '</option>';
        });
      });

      fieldHTML += '</select></div>';
      $(this).parent('div').append(fieldHTML); // Add field html
    }
  });

  $('.director').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      d--; //Decrement field counter
  });

// Add producer field

  $('.producer').on('click', '.add_button', function(e) { //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      p++; //Increment field counter

      fieldHTML += '<select class="form-control" name="' + producers[p] +'">' +                                   
                   '<option value="">select</option>';              
        $.ajax({        
        method: 'GET',        
        url: '../../includes/get_producers.php'        
        }).done.(function(data){
                     
        var result = $.parseJSON(data);
                     
        $.each(result, function(key, value){        
        fieldHTML += '<option>' + value['FirstName'] + value['LastName'] + '</option>';        
        });      
     });
      
    fieldHTML += '</select></div>';

    $(this).parent('div').append(fieldHTML); // Add field html
    }
  });

  $('.producer').on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      p--; //Decrement field counter
  });

// Add actor field

  $('.actor').on('click', '.add_button', function(e) { //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      a++; //Increment field counter

      fieldHTML += '</select></div>';fieldHTML += '<select class="form-control" name="' + actors[a] +'">' +                                   '<option value="">select</option>';              
        $.ajax({        
        method: 'GET',        
        url: '../../includes/get_actors.php'        
        }).done.(function(data){        
        var result = $.parseJSON(data);        
          
        $.each(result, function(key, value){        
      
        fieldHTML += '<option>' + value['FirstName'] + value['LastName'] + '</option>';        
        });      
      });
      
      $(this).parent('div').append(fieldHTML); // Add field html
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
