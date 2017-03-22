<?php
  require_once('../includes/database.php');
  require_once('../includes/functions.php');
  include('../includes/header.php');

  if (isset($_POST['submit'])){

      $distributor = $_POST["distributor"];

      $distributor = mysqli_real_escape_string($connection, $distributor);

      $query = "INSERT INTO distributors
                (Distributor)
                VALUES ('{$distributor}')";

      $result = mysqli_query($connection, $query);

      $message = "Successfully added to database";

      test_query($result);

      $result_message = $message;

    } else {
      $distributor = "";
      $result_message = "";
      $result = "";
    }

 ?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Add Distributor</h1>
       <form action="add_distributor.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="distributor" class="col-sm-2 control-label">Distributor</label>
          <div class="col-sm-5">
            <input type="texbox" name="distributor" class="form-control" value="<?php echo htmlspecialchars($distributor); ?>">
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
