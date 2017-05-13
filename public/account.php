<?php
  require_once('../includes/session.php');
  require_once('../includes/functions.php');
  if($logged_in == false){
    redirect_to('login.php');
  }
  require_once('../includes/database.php');

  $active_page = "account";

  include('../includes/header.php');

  $member_id = $_GET["id"];

  $result_member = "";

  get_member($member_id);

  $member = mysqli_fetch_assoc($result_member);

  $user_name = $member["UserName"];
  $user_type = $member["UserType"];
  $first_name = $member["FirstName"];
  $last_name = $member["LastName"];
  $email = $member["Email"];
  $phone = $member["Phone"];
?>
 <div class="container">
   <div class="main">
     <div class="starter-template">
       <h1>Member Account</h1>
       <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal">
        <div class="form-group">
          <div class="form-group">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
              <?php if(isset($success_message)) { echo $success_message; } ?>
              <?php if(isset($error_message)) { echo $error_message; } ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="first_name" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5">
            <input type="texbox" name="first_name" id="first_name" class="form-control" data-validation="required" value="<?php echo htmlspecialchars($first_name); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="last_name" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-5">
            <input type="texbox" name="last_name" id="last_name" class="form-control" data-validation="required" value="<?php echo htmlspecialchars($last_name); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-5">
            <input type="email" name="email" id="email" class="form-control" data-validation="required" value="<?php echo htmlspecialchars($email); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Phone Number</label>
          <div class="col-sm-5">
            <input type="texbox" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>">
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
        <label for="user_name" class="col-sm-2 control-label">User Name</label>
          <div class="col-sm-5">
            <?php echo "<label style='padding:8px'>" . $user_name . "</label>"; ?>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <label for="user_type" class="col-sm-2 control-label">User Type</label>
          <div class="col-sm-5">
            <?php echo "<label style='padding:8px'>" . $user_type . "</label>"; ?>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="submit" value="Edit" class="btn btn-success" />
            <a type="button" href="password.php" class="btn btn-default">Change Password</a>
            <?php
              if ($_SESSION["user_type"] == "admin"){
                echo "<a type='button' href='manage_members.php' class='btn btn-default'>Back</a>";
              }
            ?>
          </div>
        </div>
      </form>
     </div>
   </div>
<?php
  include('../includes/footer.php');
?>
