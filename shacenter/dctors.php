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
        <a href="doctor.php">
            <div class="dctors-card">
                <img src="assets/images/Doctors.png" alt="">
                <h1>دکتۆرەکان</h1>
            </div>
        </a>
        <a href="expenses.php">
            <div class="dctors-card">
                <img src="assets/images/cost.png" alt="">
                <h1>خەرجیەکان</h1>
                
            </div>
        </a>
        <a href="lab.php">
            <div class="dctors-card">
                <img src="assets/images/lab.png" alt="">
                <h1>تاقیگە</h1>
                
            </div>
        </a>
        <a href="target.php">
            <div class="dctors-card">
                <img src="assets/images/target.png" alt="">
                <h1>تارگێت</h1>
                
            </div>
        </a>
    </div>
</body>
</html>