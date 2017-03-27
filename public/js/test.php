<?php

require_once('../../includes/database.php');
require_once('../../includes/functions.php');

$table_name = $_GET['name'];

$query = select_concat('{$table_name}', 'FirstName', 'LastName', 'FullName');

$result = mysqli_query($connection, $query);

$output_array = array();

$response =  while ( $row = mysqli_fetch_assoc($result)){
  array_push($output_array, $row);
 });

echo json_encode($output_array);

?>


