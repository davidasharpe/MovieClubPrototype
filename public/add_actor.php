<?php
  require_once('../includes/database.php');
  require_once('../includes/functions.php');
  include('../includes/header.php');

  if (isset($_POST['submit'])){

      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];

      $first_name = mysqli_real_escape_string($connection, $first_name);
      $last_name = mysqli_real_escape_string($connection, $last_name);

      $query = "INSERT INTO actors
                (FirstName, LastName)
                VALUES ('{$first_name}','{$last_name}')";

      $result = mysqli_query($connection, $query);

      $message = "Successfully added to database";

      test_query($result);

      $result_message = $message;


    } else {
      $first_name = "";
      $last_name = "";
      $result_message = "";
      $result = "";
    }

 ?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Add Actor</h1>
       <form action="add_actor.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="firstName" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5">
            <input type="texbox" name="first_name" id="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="lastName" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-5">
            <input type="texbox" name="last_name" id="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="submit" value="Submit" class="btn btn-success" />
          </div>
        </div>
      </form>
      <span id="message"><?php echo $result_message; ?></span>
      <span id="close"></span>
     </div>
<?php
  include('../includes/footer.php');
  mysqli_close($connection);
?>
