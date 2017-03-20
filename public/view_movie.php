<?php
  require_once('../includes/database.php');
  include('../includes/header.php');

  $id = $_GET['id'];

  // Query database
  $query_movie = "SELECT Title, ReleaseDate, RunningTime, Genre, Distributor
                  FROM Movies
                  INNER JOIN genres ON movies.GenreID = genres.GenreID
                  INNER JOIN distributors ON movies.DistributorID = distributors.DistributorID
                  WHERE MovieID = {$id}";

  $query_director = "SELECT FirstName, LastName
                     FROM directors
                     INNER JOIN director_movie ON director_movie.DirectorID = directors.DirectorID
                     WHERE MovieID = {$id}";

  $query_producer = "SELECT FirstName, LastName
                     FROM producers
                     INNER JOIN producer_movie ON producer_movie.ProducerID = producers.ProducerID
                     WHERE MovieID = {$id}";

  $query_actor = "SELECT FirstName, LastName
                  FROM actors
                  INNER JOIN actor_movie ON actor_movie.ActorID = actors.ActorID
                  WHERE MovieID = {$id}";

  $result_movie = mysqli_query($connection, $query_movie);
  $result_director = mysqli_query($connection, $query_director);
  $result_producer = mysqli_query($connection, $query_producer);
  $result_actor = mysqli_query($connection, $query_actor);

  // Test query results
  if ((!$result_movie) || (!$result_director) || (!$result_producer ) || (!$result_actor )){
    die("Database query failed.");
  }

 ?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
         <?php

             $movie = mysqli_fetch_assoc($result_movie);

             foreach ($movie as $key => $value) {
              echo "{$key} : {$value} <br/>";
             }

             echo "Directors: ";

             while ($directors = mysqli_fetch_assoc($result_director)){
               echo $directors["FirstName"]." ".$directors["LastName"].", ";
             }

             echo "<br/>";
             echo "Producers: ";

             while ($producers = mysqli_fetch_assoc($result_producer)){
               echo $producers["FirstName"]." ".$producers["LastName"].", ";
             }

             echo "<br/>";
             echo "Actors: ";

             while ($actors = mysqli_fetch_assoc($result_actor)){
               echo $actors["FirstName"]." ".$actors["LastName"].", ";
             }

         ?>

         <br/>

         <a href='movies.php' class="button">Back</a>

     </div>
<?php
  include('../includes/footer.php');
?>
