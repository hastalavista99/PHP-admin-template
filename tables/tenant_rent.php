<!-- This is where the tenant goes after signing in, it includes all his/her rent transactions -->

<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../sign-in');
}

?>

<h1>welcome, <?php 
$name = $_SESSION['username'];
$id = $_SESSION['id'];
echo $name;?> of id 
<?php echo $id; ?>
</h1>