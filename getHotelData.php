<?php
include('./class/db.php');

if(!empty($_POST["dist_name"])){
	$name = $_POST["dist_name"];
	$query = "SELECT * FROM hotelsmotels WHERE dist_name = '$name'";
	$results = mysqli_query($dbconnect,$query);
	$row_cnt = $results->num_rows;

	if($row_cnt){
?>
	<table class="w3-table-all">
    <thead>
      <tr class="w3-teal">
        <th>HOTEL NAME</th>
        <th>ADDRESS</th>
        <th>CONTACT NO</th>
        <th>WEBSITE</th>
      </tr>
    </thead>

	<?php
    foreach ($results as $hotel) {
    ?>
    <tr>
      <td><?php echo $hotel['name'];?></td>
      <td><?php echo $hotel['address'];?></td>
      <td><?php echo $hotel['contact_no'];?></td>
      <td><a href="http://<?php echo $hotel['website'];?>"><?php echo $hotel['website'];?></a></td>
   	</tr>
   	<?php
    }
    ?>
    </table>
    <?php
	}

	else echo 'No Hotel Data is Available Now.';
	
}

?>

