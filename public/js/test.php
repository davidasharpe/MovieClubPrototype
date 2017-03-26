<?php

require_once('../../includes/database.php');
require_once('../../includes/functions.php');

$table_name = $_GET['name'];

$query = select_concat('directors', 'FirstName', 'LastName', 'FullName');

$result = mysqli_query($connection, $query);

echo "<select>"

while ($directors = mysqli_fetch_assoc($result)){
  echo "<option>".$query["FullName"]."</option>";
});


echo "</select>"

echo json_encode($output);


?>
