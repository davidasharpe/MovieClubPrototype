<?php

// Test Query Result on insert

function test_query($query_result){
  if ($query_result) {
    $message = "New record successfully added to the database";
    return $message;
  } else {
    // Failure
    die("Database query failed. " . mysqli_error($connection));
    $message = "Failed to update database";
    return $message;
  }
}

// Page redirect





// View Movie


function get_movie($movie_id){
 global $connection;
 $query = "SELECT * 
           FROM movies
           WHERE MovieID = {$movie_id}
           ORDER BY Title";
  $query_result = msqli_query($connection, $query);
  return $query_result;
}

function select_all($table, $order){
  global $connection;
  $query = "SELECT *
            FROM {$table}
            ORDER BY {$order}";
  $query_result = msqli_query($connection, $query);
  return $query_result;
}

function get_producers(){
  global $connection;
  $query = "SELECT *
            FROM producers
            ORDER BY FirstName";
  $query_result = mysqli_query($connection, $query);
  return $query_result;
}
function get_actors(){  
  global $connection;  
  $query = "SELECT *            
            FROM actors            
            ORDER BY FirstName";  
  $query_result = mysqli_query($connection, $query);  
  return $query_result;
}

function select_list_directors(){
  select_all('directors', 'FirstName');
  while ($directors = mysqli_fetch_assoc($query_result)){                        
  echo "<option value=' {$directors["DirectorID"]}'>".$directors["Directors"]."</option>";
  }
}

function select_list_producers(){
  get_producers();
  
}



/ --------------

  function select_concat($table, $column1, $column2, $column_name){
    $query_result = "SELECT CONCAT_WS(' ', {$column1}, {$column2}) AS {$column_name}
                     FROM {$table}
                     ORDER BY {$column_name} ASC";
    return $query_result;
  }

  function select($table, $column_name){
    $query_result = "SELECT {$column_name}
                     FROM {$table}
                     ORDER BY {$column_name} ASC";
    return $query_result;
  }

  function select_2col($table, $column1, $column2, $column_name){
    $query_result = "SELECT {$column1}, {$column2}
                    FROM {$table}
                    ORDER BY {$column_name} ASC";
    return $query_result;
  }

  // Database Insert Query

  function insert_5col($table, $column1, $column2, $column3, $column4, $colum5, $value1, $value2, $value3, $value4, $value5){
    $query_result = "INSERT INTO {$table} 
                     ({$column1}, {$column2}, {$column3}, {$column4}, {$colum5})
                     VALUES ('{$column1}','{$column2}','{$column3}','{$column4}','{$column5}')";
    return $query_result;
  }

  function insert_2col($table, $column1, $column2){
    $query_result = "INSERT INTO {$table}                      
                     ({$column1}, {$column2})                     
                     VALUES ('{$column1}','{$column2})";    
    return $query_result;
    
    
    
    ]




?>
