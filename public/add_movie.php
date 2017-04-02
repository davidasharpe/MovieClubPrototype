<?php
  require_once('../includes/database.php');
  require_once('../includes/functions.php');
  include('../includes/header.php');

  //Check form submit

  if(isset($_POST['submit'])){

    // Remove whitespace
    $title = trim($_POST['title']);
    $release_date = trim($_POST['release_date']);
    $running_time = trim($_POST['running_time']);
    $genre = trim($_POST['genre']);
    $distributor = trim($_POST['distributor']);

    //Filer iinput
    $title = mysqli_real_escape_string($connection, $title);
    $release_date = filter_var($release_date, FILTER_SANITIZE_NUMBER_INT);
    $running_time = intval($running_time);

    if(isset($_POST['directors'])) {$directors = $_POST['directors'];}
    if(isset($_POST['producers'])) {$producers = $_POST['producers'];}
    if(isset($_POST['actors'])) {$actors = $_POST['actors'];}

    $form_errors = false;

    if($form_errors == false){

      $insert_movie = "INSERT INTO movies
                      (Title, ReleaseDate, RunningTime, GenreID, DistributorID)
                      VALUES ('{$title}', '{$release_date}', '{$running_time}', '{$genre}', '{$distributor}')";
      if(mysqli_query($connection, $insert_movie)){
        $movie_id = mysqli_insert_id($connection);

        // Add Director(s) to new movie
        foreach ($directors as $director) {
          $insert_director = "INSERT INTO director_movie
                             (DirectorID, MovieID)
                             VALUES ('{$director}', '{$movie_id}')";
          mysqli_query($connection, $insert_director);
        }

        // Add Producer(s) to new movie
        foreach($producers as $producer){
          $insert_producer = "INSERT INTO producer_movie
                             (ProducerID, MovieID)
                             VALUES ('{$producer}', '{$movie_id}')";
          mysqli_query($connection, $insert_producer);
        }

        // Add Actor(s) to new movie
        foreach($actors as $actor){
          $insert_actor = "INSERT INTO actor_movie
                    (ActorID, MovieID)
                    VALUES ('$actor', '{$movie_id}')";
          mysqli_query($connection, $insert_actor);
        }

        $message = "<p class='success-msg'>The movie has beend successfully added to database.</p>";
      } else {
        $message = "<p class='error-msg'>There was an error. Please try again.</p>";
      }
    }
  }
?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Add Movie</h1>
       <div><?php if(isset($message)) { echo $message; } ?></div>
       <pre>
         <?php if(isset($title)) { echo $title."<br/>"; } ?>
         <?php if(isset($release_date)) { echo $release_date."<br/>"; } ?>
         <?php if(isset($running_time)) { echo $running_time."<br/>"; } ?>
         <?php if(isset($genre)) { echo $genre."<br/>"; } ?>
         <?php if(isset($distributor)) { echo $distributor."<br/>"; } ?>
       </pre>
       <pre>
         <?php if(isset($directors)) {
            foreach ($directors as $director){
              echo "Director: ".$director."<br/>";
            }
           }
         ?>
         <?php if(isset($producers)) {
            foreach($producers as $producer){
              echo "Producer: ".$producer."<br/>";
            }
           }
         ?>
         <?php if(isset($actors)) {
           foreach($actors as $actor){
             echo "Actor: ".$actor."<br/>"; }
           }
         ?>
       </pre>
       <form name="add_movie" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-5">
            <input type="texbox" class="form-control" id="title" name="title" value="<?php if(isset($title)) { echo htmlspecialchars($title); } ?>" data-validation="required">
          </div>
          <div class=col-sm-5>
          </div>
        </div>
        <div class="form-group">
          <label for="director" class="col-sm-2 control-label">Director</label>
            <div class="col-sm-5">
              <div class="director">
                <div class="field">
                  <select multiple class="form-control" id="directors" name="directors[]" data-validation="required">
                      <?php get_directors(); ?>
                  </select>
                </div>
              </div>
              <br/>
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
                <select multiple class="form-control" id="producers" name="producers[]" data-validation="required">
                  <?php get_producers(); ?>
                </select>
              </div>
            </div>
            <br/>
            <a href="add_producer.php" class="link">Add Producer</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="release_date" class="col-sm-2 control-label">Release Date</label>
          <div class="col-sm-5">
            <input type="date" class="form-control" id="release_date" name="release_date" data-validation="required date" data-validation-format="yyyy-mm-dd">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="running_time" class="col-sm-2 control-label">Running Time</label>
          <div class="col-sm-5">
            <input type="texbox" class="form-control" id="running_time" name="running_time" value="<?php if(isset($running_time)){ echo htmlspecialchars($running_time); } ?>" data-validation="required number">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="genre" class="col-sm-2 control-label">Genre</label>
          <div class="col-sm-5">
            <select class="form-control" id="genre" name="genre" data-validation="required">
              <option value="">select</option>
                <?php get_genres(); ?>
            </select>
            <br/>
            <a href="add_genre.php" class="link">Add Genre</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="actor" class="col-sm-2 control-label">Actor</label>
          <div class="col-sm-5">
            <div class="actor">
              <div class="field">
                <select multiple class="form-control" id="actors" name="actors[]" data-validation="required">
                  <?php get_actors(); ?>
                </select>
              </div>
            </div>
            <br/>
            <a href="add_actor.php" class="link">Add Actor</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="distributor" class="col-sm-2 control-label">Distributor</label>
          <div class="col-sm-5">
            <select class="form-control" id="distributor" name="distributor" data-validation="required">
              <option value="">select</option>
              <?php get_distributors(); ?>
            </select>
            <br/>
            <a href="add_distributor.php" class="link">Add Distributor</a>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
     </div>
<?php
  mysqli_close($connection);
  include('../includes/footer.php');
?>
