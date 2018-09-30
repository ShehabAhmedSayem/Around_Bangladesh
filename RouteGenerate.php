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
        $ar=array();
        $p="--->".$end;
        array_push($out,$p);
        $run=$end;
        while (1) {
          if($visited[$run][0]==$start){
            $p=$visited[$run][0]."->".$visited[$run][1]."(taka-".$visited[$run][2].")"."(start-".(floor($visited[$run][4]/60)).":".($visited[$run][4]%60).")"."(end-".(floor($visited[$run][3]/60)).":".($visited[$run][3]%60).")";
            array_push($out,$p);
            //break;

            $q=array($visited[$run][0],$run,$visited[$run][1],$visited[$run][2],$visited[$run][4],$visited[$run][3]);
            array_push($ar,$q);
            break;
          }
          else{
            "(taka-".$visited[$run][2].")".
            $p="--->".$visited[$run][0]."->".$visited[$run][1]."(taka-".$visited[$run][2].")"."(start-".(floor($visited[$run][4]/60)).":".($visited[$run][4]%60).")"."(end-".(floor($visited[$run][3]/60)).":".($visited[$run][3]%60).")";
            array_push($out,$p);

            $q=array($visited[$run][0],$run,$visited[$run][1],$visited[$run][2],$visited[$run][4],$visited[$run][3]);
            array_push($ar,$q);
          }
          $run=$visited[$run][0];
        }
        //print string

        //'".$start."','".$end."','".$s."',500


        $s="";
        for($p=sizeof($out)-1;$p>=0;$p--){
          $s=$s.$out[$p];
        }
          //echo $s;
        
        ?>

        <!-- create table -->
<div class="container-fluid">
    <h1>Your Requested Route:</h1>
    <br/>
        <div class="container">            
          <table class="table-hover w3-table-all">
            <thead  >
              <tr class="w3-teal">
                <th>FROM</th>
                <th>TO</th>
                <th>TRANSPORT</th>
                <th>COST</th>
                <th>START TIME</th>
                <th>END TIME</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sum=0;
                for($p=sizeof($ar)-1;$p>=0;$p--){
                  $sum=$sum+$ar[$p][3];
                    ?><tr>
                        <th><?php echo $ar[$p][0]; ?></th>
                        <th><?php echo $ar[$p][1]; ?></th>
                        <th><?php echo $ar[$p][2]; ?></th>
                        <th><?php echo $ar[$p][3]; ?></th>
                        <th><?php echo floor($ar[$p][4]/60)?>:<?php if($ar[$p][4]%60==0) echo"00"; 
                                                                else echo ($ar[$p][4]%60);?></th>
                        <th><?php echo floor($ar[$p][5]/60)?>:<?php if($ar[$p][4]%60==0) echo"00"; 
                                                                else echo ($ar[$p][4]%60);?></th>
                      <tr><?php } ?>
                  <tr>
                <th><?php echo "";?></th>
                <th><?php echo "";?></th>
                <th><?php echo "Total Cost =";?></th>
                <th><?php echo $sum;?></th>
                <th><?php echo "";?></th>
                <th><?php echo "";?></th>
              </tr>
            </tbody>

          </table>
        </div>
        

        <?php
        //check the existing string
        $thesql="SELECT * FROM routes where route='".$s."'";
        $thequery=mysqli_query($GLOBALS['dbconnect'], $thesql);
        $no=$thequery->num_rows;
        if(!$no){
          $thsql="INSERT INTO routes values (\"\",'".$start."','".$end."','".$s."','".$sum."')";
          $thquery=mysqli_query($GLOBALS['dbconnect'], $thsql);
        }
      }
    }
    ?>
    <!-- ARCHIVE -->
    <br/><br/><hr/>
    <div style="margin-left:80px;">
    <h2>Archive</h2>
    <?php
       $thesql="SELECT * FROM routes where start ='".$start."' and end = '".$end."'";
        $thequery=mysqli_query($GLOBALS['dbconnect'], $thesql);
        $i=1;
        while ($cat_r=mysqli_fetch_assoc($thequery)){
                    echo $i." . ".$cat_r['route']."<br/>"."<br/>";
                    echo "<h4>Cost = ".$cat_r['cost']."</h4><br/>";
                    $i++;  
                  }
    ?>
    </div>
   

   <?php include('footer.php');?>