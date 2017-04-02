<?php
  require_once('../includes/database.php');
  require_once('../includes/functions.php');
  include('../includes/header.php');

  $movie_id = $_GET['id'];
?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <div class="row">
         <div class="col-lg-6">
            <table class="table">
              <?php list_movie($movie_id) ?>
                <tr>
                  <td><b>Directors</b></td>
                  <td><ul class="list"><?php list_directors($movie_id) ?></ul></td>
                </tr>
                <tr>
                  <td><b>Producers</b></td>
                  <td><ul class="list"><?php list_producers($movie_id) ?></ul></td>
                </tr>
                <tr>
                  <td><b>Actors</b></td>
                  <td><ul class="list"><?php list_actors($movie_id) ?></ul></td>
                </tr>
              </table>
           <br/>
           <a href='movies.php' class="button">Back</a>
         </div>
     </div>
   </div>
<?php
  include('../includes/footer.php');
?>
