<?php
$con=mysqli_connect('localhost','root','','task');
session_start();

?>

<html>
  <head>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['patient_type','value'],
        //   ['male',100],
        //   ['female',20]

          <?php
          $q = mysqli_query($con,"SELECT * FROM `hospital1 outpatient` WHERE patient_type = 'NEW'");
          
          while($col = mysqli_fetch_array($q)){
          echo "['NEW',".$col['no_of_patients']."],";
          }
          

          $q1 = mysqli_query($con,"SELECT * FROM `hospital1 outpatient` WHERE patient_type = 'REVIEW'");
          
          while($col2 = mysqli_fetch_array($q1)){
          echo "['REVIEW',".$col2['no_of_patients']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'Outpatients'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
   
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['surgery_name','no_of_surgeries'],
        //   ['male',100],
        //   ['female',20]

          <?php
          $q01 = mysqli_query($con,"SELECT * FROM `hospital1 surgeries` WHERE surgery_name1 = 'CATARACT'");
          
          while($col00 = mysqli_fetch_array($q01)){
          echo "['CATARACT',".$col00['no_of_surgeries1']."],";
          }
          

          $q02 = mysqli_query($con,"SELECT * FROM `hospital1 surgeries` WHERE surgery_name1 = 'GLAUCOMA'");
          
          while($col02 = mysqli_fetch_array($q02)){
          echo "['GLAUCOMA',".$col02['no_of_surgeries1']."],";
          }
          
          $q03 = mysqli_query($con,"SELECT * FROM `hospital1 surgeries` WHERE surgery_name1 = 'CORNEA (Pterygium)'");
          
          while($col03 = mysqli_fetch_array($q03)){
          echo "['CORNEA (Pterygium)',".$col03['no_of_surgeries1']."],";
          }
          $q04 = mysqli_query($con,"SELECT * FROM `hospital1 surgeries` WHERE surgery_name1 = 'OTHER SURGERIES'");
          
          while($col04 = mysqli_fetch_array($q04)){
          echo "['OTHER SURGERIES',".$col04['no_of_surgeries1']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'Surgery'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['surgery_name2','no_of_surgeries2'],
        //   ['male',100],
        //   ['female',20]

          <?php
          $q05 = mysqli_query($con,"SELECT * FROM `hospital1 camp` WHERE surgery_name2 = 'CATARACT'");
          
          while($col05 = mysqli_fetch_array($q05)){
          echo "['CATARACT',".$col05['no_of_surgeries2']."],";
          }
          

          $q06 = mysqli_query($con,"SELECT * FROM `hospital1 camp` WHERE surgery_name2 = 'GLAUCOMA'");
          
          while($col06 = mysqli_fetch_array($q06)){
          echo "['GLAUCOMA',".$col06['no_of_surgeries2']."],";
          }
          
          $q07 = mysqli_query($con,"SELECT * FROM `hospital1 camp` WHERE surgery_name2 = 'CORNEA (Pterygium)'");
          
          while($col07 = mysqli_fetch_array($q07)){
          echo "['CORNEA (Pterygium)',".$col07['no_of_surgeries2']."],";
          }
          $q08 = mysqli_query($con,"SELECT * FROM `hospital1 camp` WHERE surgery_name2 = 'OTHER SURGERIES'");
          
          while($col08 = mysqli_fetch_array($q08)){
          echo "['OTHER SURGERIES',".$col08['no_of_surgeries2']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'camp'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]

<?php
$q11 = mysqli_query($con,"SELECT * FROM `hospital1 lifeline_camp`");
          
 while($col11 = mysqli_fetch_assoc($q11))
 {
            $a = $col11['hospital_surgery'];
            $b = $col11['train_surgery'];
}

if($a == '0' && $b == '0')
{
    $_SESSION['stat'] = "No records found!!";
}
else
{
echo "['hospital_surgery',".$a."],";
        
echo "['train_surgery',".$b."],";
                  
}
    
          
          
?>
        ]);

        var options = {
          title: 'Lifeline Camp'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]

          <?php
          $q10 = mysqli_query($con,"SELECT * FROM `hospital1 camp_details`");
          
          while($col10 = mysqli_fetch_assoc($q10)){
          echo "['total_camp',".$col10['total_camp']."],";
                  
          echo "['total_op',".$col10['total_op']."],";
                  
          echo "['total_ip',".$col10['total_ip']."],";
                 
          echo "['gp2',".$col10['gp2']."],";
                  
          echo "['order2',".$col10['order2']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'camp details'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart6);

      function drawChart6() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]
        <?php
$q12 = mysqli_query($con,"SELECT * FROM `hospital1 optical_hospital`");
          
 while($col12 = mysqli_fetch_assoc($q12))
 {
            $a1 = $col12['gp'];
            $b1 = $col12['order1'];
}

// if($a1 == '0' && $b1 == '0')
// {
//     $_SESSION['stat'] = "No records found!!";
// }
// else
// {
echo "['gp',".$a1."],";
        
echo "['order1',".$b1."],";
                  
// }
    
          
          
?>
        ]);

        var options = {
          title: 'optical Hospital'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart7);

      function drawChart7() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]
        <?php
          $q13 = mysqli_query($con,"SELECT * FROM `hospital1 other_treatments` WHERE treatment_name = 'HFA'");
          
          while($col13 = mysqli_fetch_array($q13)){
          echo "['HFA',".$col13['no_of_treatments']."],";
          }


          $q13 = mysqli_query($con,"SELECT * FROM `hospital1 other_treatments` WHERE treatment_name = 'Yag PI (Single eye)'");
          
          while($col13 = mysqli_fetch_array($q13)){
          echo "['Yag PI (Single eye)',".$col13['no_of_treatments']."],";
          }
          
          $q13 = mysqli_query($con,"SELECT * FROM `hospital1 other_treatments` WHERE treatment_name = 'Yag PI (Both eyes)'");
          
          while($col13 = mysqli_fetch_array($q13)){
          echo "['Yag PI (Both eyes)',".$col13['no_of_treatments']."],";
          }
          $q13 = mysqli_query($con,"SELECT * FROM `hospital1 other_treatments` WHERE treatment_name = 'Yag Cap'");
          
          while($col13 = mysqli_fetch_array($q13)){
          echo "['Yag Cap',".$col13['no_of_treatments']."],";
          }
          $q13 = mysqli_query($con,"SELECT * FROM `hospital1 other_treatments` WHERE treatment_name = 'CCT Laser'");
          
          while($col13 = mysqli_fetch_array($q13)){
          echo "['CCT Laser',".$col13['no_of_treatments']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'Lifeline Camp'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]

<?php
$q11 = mysqli_query($con,"SELECT * FROM `hospital1 lifeline_camp`");
          
 while($col11 = mysqli_fetch_assoc($q11))
 {
            $a = $col11['hospital_surgery'];
            $b = $col11['train_surgery'];
}

if($a == '0' && $b == '0')
{
    $_SESSION['stat'] = "No records found!!";
}
else
{
echo "['hospital_surgery',".$a."],";
        
echo "['train_surgery',".$b."],";
                  
}
    
          
          
?>
        ]);

        var options = {
          title: 'Lifeline Camp'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['details','values'],
        //   ['male',100],
        //   ['female',20]

<?php
$q11 = mysqli_query($con,"SELECT * FROM `hospital1 lifeline_camp`");
          
 while($col11 = mysqli_fetch_assoc($q11))
 {
            $a = $col11['hospital_surgery'];
            $b = $col11['train_surgery'];
}

if($a == '0' && $b == '0')
{
    $_SESSION['stat'] = "No records found!!";
}
else
{
echo "['hospital_surgery',".$a."],";
        
echo "['train_surgery',".$b."],";
                  
}
    
          
          
?>
        ]);

        var options = {
          title: 'Lifeline Camp'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart9'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <div class="flex flex-row">
    <div id="piechart" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    <div id="piechart2" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    <div id="piechart3" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    </div>
      <div class="flex flex-row">
    <div id="piechart4" style="width: 500px; height: 300px;">

<?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?>

</div>
    <div id="piechart5" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    <div id="piechart6" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    </div>
      <div class="flex flex-row">
    <div id="piechart7" style="width: 500px; height: 300px;">

<?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?>

</div>
    <div id="piechart8" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    <div id="piechart9" style="width: 500px; height: 300px;">
    <?php
if(isset($_SESSION['stat'])){
    echo $_SESSION['stat'];
}

?></div>
    </div>
  </body>
</html>