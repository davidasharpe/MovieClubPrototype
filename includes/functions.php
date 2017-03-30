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

// Database Select Query

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


?>
