<?php

require_once('../../includes/database.php');
require_once('../../includes/functions.php');

$table_name = $_GET['name'];

$query = select_concat('directors', 'FirstName', 'LastName', 'FullName');

$result = mysqli_query($connection, $query);

$output_array = array();

$response =  while ( $row = mysqli_fetch_assoc($result)){
  array_push($out_array, $row);
  echo "<option>".$query["FullName"]."</option>";
});

echo json_encode($output_array);

?>


