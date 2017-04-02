<?php

// Test Query Result on Insert

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

// Test Query Result on Select

function test_select_query($query_result){
  if(!$query_result){
    die("Database query failed.");
  }
}

// Movies

function list_all_movies(){
  global $connection;
  global $result_movies;
  $query_movies = "SELECT MovieID, Title, ReleaseDate, RunningTime, Genre, Distributor
                   FROM movies
                   INNER JOIN genres ON movies.GenreID = genres.GenreID
                   INNER JOIN distributors ON movies.DistributorID = distributors.DistributorID
                   ORDER BY Title ASC";
  $result_movies = mysqli_query($connection, $query_movies);
  test_select_query($query_movies);
  return $result_movies;
}

// View Movie

function list_movie($movie_id){
  global $connection;
  $query_movie = "SELECT Title, ReleaseDate, RunningTime, Genre, Distributor
                  FROM Movies
                  INNER JOIN genres ON movies.GenreID = genres.GenreID
                  INNER JOIN distributors ON movies.DistributorID = distributors.DistributorID
                  WHERE MovieID = {$movie_id}";
  $result_movie = mysqli_query($connection, $query_movie);
  test_select_query($result_movie);
  $movie = mysqli_fetch_assoc($result_movie);
  foreach ($movie as $key => $value) {
   echo "<tr>";
   echo "<td><b>".$key."</b><td>".$value."</td>";
   echo "</tr>";
  }
}

function list_directors($movie_id){
  global $connection;
  $query_director = "SELECT FirstName, LastName
                     FROM directors
                     INNER JOIN director_movie ON director_movie.DirectorID = directors.DirectorID
                     WHERE MovieID = {$movie_id}";
  $result_directors = mysqli_query($connection, $query_director);
  test_select_query($result_directors);
  while ($directors = mysqli_fetch_assoc($result_directors)){
    echo "<li>".$directors["FirstName"]." ".$directors["LastName"]."</li>";
  }
}

function list_producers($movie_id){
  global $connection;
  $query_producer = "SELECT FirstName, LastName
                     FROM producers
                     INNER JOIN producer_movie ON producer_movie.ProducerID = producers.ProducerID
                     WHERE MovieID = {$movie_id}";
  $result_producers = mysqli_query($connection, $query_producer);
  test_select_query($result_producers);
  while ($producers = mysqli_fetch_assoc($result_producers)){
    echo "<li>".$producers["FirstName"]." ".$producers["LastName"]."</li>";
  }
}

function list_actors($movie_id){
  global $connection;
  $query_actor = "SELECT FirstName, LastName
                  FROM actors
                  INNER JOIN actor_movie ON actor_movie.ActorID = actors.ActorID
                  WHERE MovieID = {$movie_id}";
  $result_actors = mysqli_query($connection, $query_actor);
  test_select_query($result_actors);
  while ($actors = mysqli_fetch_assoc($result_actors)){
    echo "<li>".$actors["FirstName"]." ".$actors["LastName"]."</li>";
  }
}

// Add Movies

function select_all($table, $order){
  global $connection;
  global $query_result;
  $query = "SELECT *
            FROM {$table}
            ORDER BY {$order}";
  $query_result = mysqli_query($connection, $query);
  test_select_query($query_result);
  return $query_result;
}

function get_directors(){
  global $connection;
  $query = "SELECT *
            FROM directors
            ORDER BY FirstName";
  $result_director = mysqli_query($connection, $query);
  test_select_query($result_director);
  while ($directors = mysqli_fetch_assoc($result_director)){
        echo "<option value='{$directors["DirectorID"]}'>".$directors["FirstName"]." ".$directors["LastName"]."</option>";
    }
  mysqli_free_result($result_director);
}

function get_producers(){
  global $connection;
  $query = "SELECT *
            FROM producers
            ORDER BY FirstName";
  $result_producer = mysqli_query($connection, $query);
  test_select_query($result_producer);
  while ($producers = mysqli_fetch_assoc($result_producer)){
    echo "<option value='{$producers["ProducerID"]}'>".$producers["FirstName"]." ".$producers["LastName"]."</option>";
  }
  mysqli_free_result($result_producer);
}

function get_actors(){
  global $connection;
  $query = "SELECT *
            FROM actors
            ORDER BY FirstName";
  $result_actor = mysqli_query($connection, $query);
  test_select_query($result_actor);
  while ($actors = mysqli_fetch_assoc($result_actor)){
    echo "<option value='{$actors["ActorID"]}'>".$actors["FirstName"]." ".$actors["LastName"]."</option>";
  }
  mysqli_free_result($result_actor);
}

function get_genres(){
  global $connection;
  global $query_result;
  $query = "SELECT *
            FROM genres
            ORDER BY Genre";
  $query_genres = mysqli_query($connection, $query);
  test_select_query($query_genres);
  while ($genres = mysqli_fetch_assoc($query_genres)){
    echo "<option value='{$genres["GenreID"]}'>".$genres["Genre"]."</option>";
  }
}

function get_distributors(){
  global $connection;
  global $query_result;
  $query = "SELECT *
            FROM distributors
            ORDER BY Distributor";
  $query_distributors = mysqli_query($connection, $query);
  test_select_query($query_distributors);
  while ($distributors = mysqli_fetch_assoc($query_distributors)){
    echo "<option value='{$distributors["DistributorID"]}'>".$distributors["Distributor"]."</option>";
  }
}

?>
