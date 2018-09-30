<?php
include('header.php');
include('./class/db.php');

    if(isset($_POST['submit'])){

      //echo "<h1>Hello World</h1>";
      //echo $_POST['district'];
      //echo $_POST['des_district'];
      //echo $_POST['train'];
      //echo $_POST['opt'];
      //echo $_POST['shahi'];
      //echo $_POST['hanif'];
      
      
      $start = $_POST['district'];        //$_GET['dist'], 
      $end = $_POST['des_district'];    //$cat_rs['dist_name']

      //djkstra
      //$visited=(parent,medium,price,departure_time,arrival_time)
      
      $visited=array();
      $gotit=0;

      function go(array &$visited,$start,$end){

        $isetq=array();
        $queue=array();
        $visited[$start]=array("start","train",0,0);
        $queue[$start]=0;
        
        while (count($queue)) {
          $t = array_search(min($queue), $queue);
          $t_a=$visited[$t][3];
          if($t==$end){
            $GLOBALS['gotit']=1;
            break;
          }

            
            $cat_sql="SELECT * FROM train_schedule where dist_name='".$t."'";
            $cat_query=mysqli_query($GLOBALS['dbconnect'], $cat_sql);

          while ($cat_rs=mysqli_fetch_assoc($cat_query)){ 
            if(isset($_POST[$cat_rs['transport']])){
              $r=$cat_rs['destination'];
              if($_POST['opt']=='time'){
                $r_c=$queue[$t]+$cat_rs['time_span'];
                if($cat_rs['departure_time']<$t_a)
                  $r_c=$r_c+(1440-$t_a)+$cat_rs['departure_time'];
                else
                  $r_c=$r_c+($cat_rs['departure_time']-$t_a);
              }
              else
                $r_c=$queue[$t]+$cat_rs['price'];
              
              if(!isset($isetq[$r]) and (!isset($visited[$r]) or ($queue[$r]>$r_c))){
                $b=0;
                $c=0;
                if($_POST['opt']=='cost' and ($cat_rs['departure_time']<$t_a)){
                  $c++;
                  $cat_sq="SELECT * FROM train_schedule where dist_name='".$t."' and destination='".$r."'";
                  $cat_quer=mysqli_query($GLOBALS['dbconnect'], $cat_sq);
                  while ($cat_r=mysqli_fetch_assoc($cat_quer)){
                    if($cat_r['departure_time']>=$t_a){
                      $b++;
                      break;
                    }  
                  }
                }

                if($c==0 or $b==0){
                  $visited[$r]=array($t,$cat_rs['transport'],$cat_rs['price'],$cat_rs['arrival_time'],$cat_rs['departure_time']);
                  $queue[$r]=$r_c;
                }
              }
            }
          }

          unset($queue[$t]);
          $isetq[$t]=1;
        }
      }


      go($visited,$start,$end);

      if($gotit==1){
        $out= array();
        $p="--->".$end;
        array_push($out,$p);
        $run=$end;
        while (1) {
          if($visited[$run][0]==$start){
            $p=$visited[$run][0]."->".$visited[$run][1]."(taka-".$visited[$run][2].")"."(start-".($visited[$run][4]).")"."(end-".($visited[$run][3]).")";
            array_push($out,$p);
            break;
          }
          else{
            //"(taka-".$visited[$run][2].")".
            $p="--->".$visited[$run][0]."->".$visited[$run][1]."(start-".($visited[$run][4]).")"."(end-".($visited[$run][3]).")";
            array_push($out,$p);
          }
          $run=$visited[$run][0];
        }
        $s="";
        for($p=sizeof($out)-1;$p>=0;$p--){
          $s=$s.$out[$p];
        }
        ?><h3 class="size"><?php echo $s; ?></h3>
        <?php
      }
    }
?>


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


