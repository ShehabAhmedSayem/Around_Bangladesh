<?php
include('header.php');
include('./class/db.php');

$query = "SELECT * FROM location where location_name='".$_GET['loc_name']."'";
$results = mysqli_query($dbconnect, $query);
$location = mysqli_fetch_assoc($results);

?>
<header>


<style>
  
  .detailhead{
    background-image:url('./images/Back1.jpg');
    text-align:center;
    padding:12px;
    border-radius:10px;
    margin-top:50%;
    color:black;
  }

  .detail{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius:15px;
    padding:20px;
  }

</style>

</header>


<div class="container">
  </br>
  </br>
  <!-- name -->
  <h1 class="jumbotron" style="text-align:left;background-color:grey;width:50%;"><?php echo strtoupper($location['location_name']); ?></h1>
  </br>
  <!-- image -->
  <div id="im"><img src="images/<?php echo $location['picture']; ?>"></div>
  </br>
    
  <div id="overview" class="container-fluid">
    
    <div class="row">
      <div class="col-xs-4"></div>
      <div class="col-xs-8">
        <h2 class="detailhead">O V E R V I E W</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4 ">
        <div id="map" style="width:100%;height:420px;margin-right: 10px;"></div>


      </div>
      <div class="col-xs-8 detail">
        <p><?php echo $location['details']; ?></p>
      </div>

    </div>  
      
    
    <br/>
    <hr/>
    <br/>
    
    <div id="how" class="row">
      
      <div class="col-xs-8 detail">
        <p><?php echo $location['How_to_go']; ?></p>
      </div>

      <div class="col-xs-4">
       <h2 class="detailhead">H O W  T O  G O</h2>
      </div>
    </div>
    <br/>
    <hr/>
    <br/>

    <div id="where_stay" class="row">
      
      <div class="col-xs-4">
       <h2 class="detailhead">W H E R E T O S T A Y</h2>
      </div>

      <div class="col-xs-8 detail">
        <p><?php echo $location['Where_to_stay']; ?></p>
      </div>
 
    </div>
    <br/>
    <hr/>
    <br/>

    <div id="where_eat" class="row">
      
      <div class="col-xs-8 detail">
        <p><?php echo $location['Where_to_eat']; ?></p>
      </div>

      <div class="col-xs-4">
       <h2 class="detailhead">W H E R E  T O  E A T</h2>
      </div>
    </div>
    <br/>
    <hr/>
    <br/>

  </div>
 

</div>


<script>
function myMap() {
  var myCenter = new google.maps.LatLng(<?php echo $location['lat'] ?>,<?php echo $location['lng'] ?>);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 11};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAdT_N5DCsQXVQ36my8n0h5qvJYTiP_1zY&callback=myMap"></script>


<?php include('footer.php');?>


<!-- <script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(<?php echo $location['lat'] ?>,<?php echo $location['lng'] ?>),
    zoom:10,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAdT_N5DCsQXVQ36my8n0h5qvJYTiP_1zY&callback=myMap"></script>
 -->