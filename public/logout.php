<?php
require_once('../includes/session.php');
require_once('../includes/functions.php');
if(empty($logged_in)){
  // if the session value is empty, he is not yet logged in
  // redirect to login page
  redirect_to('login.php');
}
// LOGIN set default values
if (isset($_GET["action"])) {
	$action = $_GET["action"];
} else {
	$action = "";
}
// get and check the action
// action determines whether to logout or show the message that the user is already logged in
// executed when user clicked on "Logout?" link
if($action=='logout'){

    // destroy session, it will remove ALL session settings
    session_destroy();

    //redirect to login page
    header('Location: login.php');
}
else {
    redirect_to('index.php');
}
?>
