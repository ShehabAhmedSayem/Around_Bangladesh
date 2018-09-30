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


<!--javascript-->


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


</script>

</body>
</html>
