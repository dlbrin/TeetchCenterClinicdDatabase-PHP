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
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <?php
  if(isset($_SESSION['secc'])){?>
    <script>
      swal({
        title: "<?php echo $_SESSION['secc']; ?>",
        icon: "success",
        button: "باشە",
      });
    </script>
    <?php unset($_SESSION['secc']); } ?>
  <div class="regester">
    <div class="container">
      <div class="formtitle"><h1>  فۆرمی نەخۆش</h1></div>
      <div class="inputs">
        <form method="POST" action="modal/sickdata.inc.php">
        <label>ناو</label>
        <input class="inputform" type="text" name="name" placeholder="ناوی نەخۆش داخیل بکە" />
        <label>ژمارەی موبایل</label>
        <input class="inputform" type="text" name="phone" placeholder="ژمارەی موبایل داخیل بکە" />
        <label>بەروار</label>
        <input class="inputform" type="date" name="date" />
        <div class="prace">
          <div>
            <label>جۆری کێشەکە </label>
            <textarea name="problem" id="" cols="40" rows="10"></textarea>
          </div>
          <div>
            <div class="dropdown">
              <select name="doctorname">
                <option>دکتۆر</option>
                <option>د.شارا</option>
                <option>د.سەیف</option>
                <option>د.رعد</option>
              </select>
            </div>
          </div>
        </div>
        <div class="prace">
          <div>
            <label>پارەی تەواو</label>
            <input class="inputform" type="text" name="firstmoney" placeholder="پارەی تەواو" />
          </div>
          <div>
            <label> پارەی پێشەکی</label>
            <input class="inputform" type="text" name="lastmoney" placeholder="   پارەی تەواو" />
          </div>
        </div>
        <button name="sickbtn">داخیل بوون</button>
        </form>
      </div>
    </div>
  </body>
  </html>