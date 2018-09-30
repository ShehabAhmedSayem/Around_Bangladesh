<?php
include('header.php');
include('./class/db.php');

if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $suggestion = $_POST['suggestion'];

  $query = 'INSERT INTO suggestion VALUES (\'\',"'.$name.'","'.$email.'","'.$suggestion.'")';
  mysqli_query($dbconnect, $query);          
  
}

?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<div id="portfolio" class="container-fluid text-center bg-grey" style="margin-top:3%">
  
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    
    <!-- Indicators -->
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="img-responsive" src="images/lalbagh.jpg" style="width:1366px;height:550px;">
      </div>
      <div class="item">
        <img class="img-responsive" src="images/cox's.jpg" style="width:1366px;height:550px;">
      </div>
      <div class="item">
        <img class="img-responsive" src="images/Bisnakandi.jpg" style="width:1366px;height:550px;">
      </div>
    </div>

    <!-- Left and right controls -->
    
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>




<!-- Container (Place Section) -->



<div id="place" class="container-fluid">
  <div class="row">
  <div class="col-sm-5">
      <span class="glyphicon logo slideanim"><img src="images/Bangladesh_map.png"></span>
  </div>
  <div class="col-sm-7">
     
  <h2>select place you want to go</h2>
  
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
    <select name="district" id="dist_list" onchange = "getPlace(this.value);">
      <option value="">Select District</option>
      <!--populate from database-->
      <option value=""></option>
    </select>
  </div>

<div>
    <select name="location" id="loc_list">
      <option value="">Select Place Name</option>
      <!--populate from database-->
      <option value=""></option>  
  </select> 
  <br/>
    <input name="Submit" type="submit" onclick="getloc(getElementById('loc_list').value);">
  </div>
  

</div>
</div>
</div>



<!--Random places-->



<div id="randomPlace" class="container-fluid text-center bg-grey">
  <h2 classs="jumbotron">Places</h2>
  <h4>You can visit</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <img class="img-responsive" src="images/st_martin.jpg" style="width:460px;height:345px;"> 
      <h4>St.Martin</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <img class="img-responsive" src="images/bisnakandi.jpg" style="width:460px;height:345px;"> 
      <h4>Bisnakandi</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <img class="img-responsive" src="images/cox's.jpg" style="width:460px;height:345px;"> 
      <h4>Cox's bazar</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
  <br><br>
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

function getPlace(val){
  
  $.ajax({

      type: "POST",
      url: "getplace.php",
      data: "dist_name="+val,
      success: function(data){
          $("#loc_list").html(data);
      }

  });
}

  function getloc(val){
    
    window.location = 'place.php?loc_name='+val;
    return 0;
}

</script>

</body>
</html>
