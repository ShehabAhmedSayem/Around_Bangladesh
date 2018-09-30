<?php
include('header.php');
include('./class/db.php');
?>




<div id="place" class="container-fluid">
  <div class="row">
  <div class="col-sm-5">
      <span class="glyphicon logo"><img src="images/Bangladesh_map.png"></span>
  </div>
  <div class="col-sm-7">
     
  <h2>Select the District</h2>
  
  <div class="division">
    <select name="division" onchange = "getDist(this.value);">
      <option value="Select Division">Select Division</option>
      <!--populate from database-->
      <?php
      $query = "SELECT * FROM division";
      $results = mysqli_query($dbconnect,$query);

      foreach ($results as $division) {
      ?>
        <option value="<?php echo $division['div_name']; ?>"> <?php echo $division['div_name']; ?> </option>
      <?php
      }
      ?>
    </select>
  </div>


  <div class="district">
    <select name="district" id="dist_list">
      <option value="">Select District</option>
      <!--populate from database-->
      <option value=""></option>
    </select>
    <input name="Submit" type="submit" onclick="getloc(getElementById('dist_list').value);">
  </div>
  

</div>
</div>
</div>


<div class="w3-container" id="hotel_list">
  
</div>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>



<!-- Javascript-->



<script>

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})


function getDist(val){
  
  $.ajax({

      type: "POST",
      url: "getdata.php",
      data: "name="+val,
      success: function(data){
          $("#dist_list").html(data);
      }

  });
}

  function getloc(val){
    
   $.ajax({

      type: "POST",
      url: "getHotelData.php",
      data: "dist_name="+val,
      success: function(data){
          $("#hotel_list").html(data);
      }

  });
}


</script>

</body>
</html>
