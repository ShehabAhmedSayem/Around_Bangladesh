<?php
include('./class/db.php');

if(!empty($_POST["name"])){
	$name = $_POST["name"];
	$query = "SELECT * FROM district WHERE div_name = '$name'";
	$results = mysqli_query($dbconnect,$query);

    foreach ($results as $dist) {
    ?>
      <option value="<?php echo $dist['dist_name']; ?>"> <?php echo $dist['dist_name']; ?> </option>
   	<?php
    }
}

?>