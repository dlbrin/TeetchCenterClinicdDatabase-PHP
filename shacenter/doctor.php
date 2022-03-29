<?php include 'include/config.php';?>
<?php
if($adminid == false){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <a href="" class="back">گەڕانەوە</a>
    <div class="alldoctor">
        <?php
        $DoctorQuery = mysqli_query($db , "SELECT * FROM `doctortable`");
        while($DoctorRow = mysqli_fetch_assoc($DoctorQuery)){?>
            <a href="doctorsick.php?doctor=<?php echo sec($DoctorRow['name']);?>">
                <div class="dctors-card">
                    <img src="assets/images/Doctors.png" alt="">
                    <h1><?php echo sec($DoctorRow['name']);?></h1>
                </div>
            </a>
        <?php } ?>
    </div>
    
</body>
</html>