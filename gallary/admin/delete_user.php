<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>


<?php

if (empty($_GET['id'])) {
    redirect("users.php");
}

$photo = User::find_by_id($_GET['id']);

if ($photo) {
    $photo->delete();
    redirect("users.php");
} else {
    redirect("users.php");
}


?>
