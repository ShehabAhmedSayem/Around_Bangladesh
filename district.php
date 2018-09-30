<?php
include('header.php');
?>
<div id="randomPlace" class="container-fluid text-center bg-grey">
  <h2 classs="jumbotron">SYLHET</h2>
  <br>
  <h4>Tourist Spots</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <img class="img-responsive img-thumbnail" src="images/19.jpg"> 
    </div>
    <div class="col-sm-4">
      <h4>Overview</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4" >
      <button class="w3-button w3-green w3-round-xxlarge" data-toggle="tooltip" title="Direction"><i class="material-icons">directions_bus</i></button>
      <button class="w3-button w3-green w3-round-xxlarge" data-toggle="tooltip" title="Hotel"><i class="material-icons">hotel</i></button>
      <button class="w3-button w3-green w3-round-xxlarge"><i class="material-icons" data-toggle="tooltip" title="More info">info</i></button>
    </div>
</div>




<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>



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

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>

</body>
</html>

