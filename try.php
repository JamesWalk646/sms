<?php
$con = mysqli_connect("localhost","root","","php_auth_api");

$sql = "SELECT * FROM `teachers` ";
$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Select Tag to data From Database in Php and Mysqli</title>
</head>
<body>
    
<select>
    <?php  while($row = mysqli_fetch_array($result)):; ?>
    <option value="Select Teacher"><?php  echo $row[1]; ?> </option>
    <!-- <option>  </option> -->
    <?php endwhile; ?>

    <p> <?php echo $row;  ?> </p>
     
</select>

</body>
</html>

<!-- <div class="row match-height">
    <div class="col-12">
        <div class="">
            <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
        </div>
    </div>
</div> -->
<!-- Chart -->
