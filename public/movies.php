<?php
  require_once('../includes/database.php');
  include('../includes/header.php');
  // Query database

  // $query = "SELECT * FROM movies";

  $query = "SELECT MovieID, Title, ReleaseDate, RunningTime, Genre, Distributor
            FROM movies
            INNER JOIN genres ON movies.GenreID = genres.GenreID
            INNER JOIN distributors ON movies.DistributorID = distributors.DistributorID
            ORDER BY Title ASC";

  $result = mysqli_query($connection, $query);
  // Test for query
  if (!$result) {
    die("Database query failed.");
  }
  // Render header
  require_once('../includes/header.php');

 ?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Movies</h1>
       <table class="table">
         <tr>
          <th>Title</th>
          <th>Release Date</th>
          <th>Running Time</th>
          <th>Genre</th>
          <th>Distributor</th>
          <th></th>
        </tr>
         <?php
          // Use returned data (if any)
          while($row = mysqli_fetch_assoc($result)){
            $id = $row["MovieID"];
         ?>
          <tr>
            <td><?php echo $row["Title"] ?></td>
            <td><?php echo $row["ReleaseDate"] ?></td>
            <td><?php echo $row["RunningTime"] ?></td>
            <td><?php echo $row["Genre"] ?></td>
            <td><?php echo $row["Distributor"] ?></td>
          <?php
            echo "<td><a href='view_movie.php?id={$id}' class='button'>View</a></td>";
          ?>
          </tr>
         <?php
          }
         ?>
       </table>
     </div>
<?php
  include('../includes/footer.php');
?>
