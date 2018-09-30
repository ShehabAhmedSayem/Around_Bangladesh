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

   <form action="RouteGenerate.php" method="post">

  <h2>Select Your Position</h2>
  
  <div class="division">
    <select name="division" onchange = "getDist(this.value);">
      <option value="">Select Division</option>
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
  </div>

  <h2>Select Your Destination</h2>
  
  <div class="division">
    <select name="division" onchange = "getDistdes(this.value);">
      <option value="">Select Division</option>
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
    <select name="des_district" id="dist_des_list">
      <option value="">Select District</option>
      <!--populate from database-->
      <option value=""></option>
    </select>
  </div>

     
        <h2>Select train service</h2>
        <div class="checkbox"><label><input type="checkbox" name="train" value="marked" checked>Train service</label></div>
        <div class="checkbox" style="margin-left: 20px;"><label><input type="checkbox" name="1stclass" value="marked" >first class</label></div>
        <div class="checkbox" style="margin-left: 20px;"><label><input type="checkbox" name="2ndclass" value="marked">second class</label></div>

        <h2>Select bus service</h2>
        <div class="checkbox"><label><input type="checkbox" name="hanif" value="marked">HANIF Poribohon</label></div>
        <div class="checkbox"><label><input type="checkbox" name="shahi" value="marked">SHAHI Poribohon</label></div>
        <div class="checkbox"><label><input type="checkbox" name="shamoly" value="marked">SHAMOLY Poribohon</label></div>

        <h2>Select plane service</h2>
        <div class="checkbox"><label><input type="checkbox" name="hanif" value="marked">US Bangla</label></div>
        <div class="checkbox"><label><input type="checkbox" name="hanif" value="marked">Biman Bangladesh</label></div>
        <div class="checkbox"><label><input type="checkbox" name="hanif" value="marked">NovoAir</label></div>
        <h2>choose your priority</h2>
        <div class="radio"><label><input type="radio" name="opt" value="time" checked>time</label></div>
        <div class="radio"><label><input type="radio" name="opt" value="cost">cost</label></div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>

  </form>

</div>
</div>
</div>


<!-- Container (about Section) -->


<div id="about" class="container-fluid">
  <h2 class="text-center">YOUR SUGGESTION</h2>
  <div class="row">
    <div class="col-sm-5">
      <h4>Contact us for any suggestion</h4>
      <p><span class="glyphicon glyphicon-map-marker"></span> Shahjalal University of Science and Technology, Sylhet</p>
      <p><span class="glyphicon glyphicon-envelope"></span> motaherhossain@gmail.com</p>
      <p><span class="glyphicon glyphicon-envelope"></span> shehabahmedsayem@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <form action="index.php" method="POST">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
          <textarea class="form-control" id="suggestion" name="suggestion" placeholder="Your Suggestion" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit" name="send">Send</button>
        </div>
      </div>
      </form>
    </div>
  </div>
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

function getDistdes(val){
  
  $.ajax({

      type: "POST",
      url: "getdata.php",
      data: "name="+val,
      success: function(data){
          $("#dist_des_list").html(data);
      }

  });
}


</script>

</body>
</html>
