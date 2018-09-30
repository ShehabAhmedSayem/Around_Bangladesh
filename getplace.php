<?php
include('./class/db.php');

if(!empty($_POST["dist_name"])){
	$name = $_POST["dist_name"];
	$query = "SELECT * FROM location WHERE dist_name = '$name'";
	$results = mysqli_query($dbconnect,$query);
	 
    foreach ($results as $loc) {
    ?>
      <option value="<?php echo $loc['location_name']; ?>"> <?php echo $loc['location_name']; ?> </option>
   	<?php
    }
}

?>