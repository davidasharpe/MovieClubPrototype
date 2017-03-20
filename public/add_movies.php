<?php
  require_once('../includes/database.php');
  require_once('../includes/functions.php');
  include('../includes/header.php');

  $query_director = select_concat('directors', 'FirstName', 'LastName', 'Directors');
  $query_producer = select_concat('producers',  'FirstName', 'LastName','Producers');
  $query_actor = select_concat('actors', 'FirstName', 'LastName', 'Actors');
  $query_genre = select('genres', 'Genre');
  $query_distributor = select('distributors', 'Distributor');

  $result_director = mysqli_query($connection, $query_director);
  $result_producer = mysqli_query($connection, $query_producer);
  $result_actor = mysqli_query($connection, $query_actor);
  $result_genre = mysqli_query($connection, $query_genre);
  $result_distributor = mysqli_query($connection, $query_distributor);

  // Test query results
  if ((!$result_director) || (!$result_producer ) || (!$result_actor ) || (!$result_genre) || (!$result_distributor )){
    die("Database query failed.");
  }
 ?>

 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Add Movie</h1>
       <div id="demo"></div>
       <form class="form-horizontal">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-5">
            <input type="texbox" class="form-control" id="title">
          </div>
          <div class=col-sm-5>
          </div>
        </div>
        <div class="form-group">
          <label for="director" class="col-sm-2 control-label">Director</label>
            <div class="col-sm-5">
              <div class="director">
                <div class="field">
                  <a href="javascript:void(0);" class="add_button" title="Add field"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                  <select class="form-control">
                    <option value="select">select</option>
                      <?php
                      while ($directors = mysqli_fetch_assoc($result_director)){
                        echo "<option value='{$directors["DirectorID"]}'>".$directors["Directors"]."</option>";
                      }
                      ?>
                  </select>
                </div>
              </div>
              <a href="add_director.php" class="link">Add Director</a>
            </div>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="form-group">
          <label for="producer" class="col-sm-2 control-label">Producer</label>
          <div class="col-sm-5">
            <div class="producer">
              <div class="field">
                <a href="javascript:void(0);" class="add_button" title="Add field"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <select class="form-control">
                  <option value="select"></option>
                  <?php
                    while ($producers = mysqli_fetch_assoc($result_producer)){
                      echo "<option value='{$producers["ProducerID"]}'>".$producers["Producers"]."</option>";
                    }
                    ?>
                </select>
              </div>
            </div>
            <a href="#" class="link">Add Producer</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="releasedate" class="col-sm-2 control-label">Release Date</label>
          <div class="col-sm-5">
            <input type="date" class="form-control" id="releasedate">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="runningtime" class="col-sm-2 control-label">Running Time</label>
          <div class="col-sm-5">
            <input type="texbox" class="form-control" id="runningtime">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="genre" class="col-sm-2 control-label">Genre</label>
          <div class="col-sm-5">
            <select class="form-control" id="genre">
              <option value="select">select</option>
                <?php
                while ($genres = mysqli_fetch_assoc($result_genre)){
                  echo "<option value='{$genres["GenreID"]}'>".$genres["Genre"]."</option>";
                }
                ?>
            </select>
            <a href="#" class="link">Add Genre</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="actor" class="col-sm-2 control-label">Actor</label>
          <div class="col-sm-5">
            <div class="actor">
              <div class="field">
                <a href="javascript:void(0);" class="add_button" title="Add field"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <select class="form-control">
                  <option value="select">select</option>
                  <?php
                  while ($actors = mysqli_fetch_assoc($result_actor)){
                    echo "<option value='{$actors["ActorID"]}'>".$actors["Actors"]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <a href="#" class="link">Add Actor</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="distributor" class="col-sm-2 control-label">Distributor</label>
          <div class="col-sm-5">
            <select class="form-control" id="distributor">
              <option value="select">select</option>
              <?php
              while ($distributors = mysqli_fetch_assoc($result_distributor)){
                echo "<option value='{$distributors["DistributorID"]}'>".$distributors["Distributor"]."</option>";
              }
              ?>
            </select>
            <a href="#" class="link">Add Distributor</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
     </div>

<?php
  include('../includes/footer.php');
  mysqli_close($connection);
?>
