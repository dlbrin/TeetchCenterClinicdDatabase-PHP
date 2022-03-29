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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="headre-of-page-with-search-serach">
    <form method="POST" action="<?php echo basename($_SERVER['REQUEST_URI']);?>">
      <input type="text" name="search" placeholder="بگەرێ...">
      <button>بگەرێ</button>
    </form>
  </div>
  <!-- DATA SEARCH -->
  <?php
  if(isset($_POST['search'])){
    $Data = sec($_POST['search']);
    $doctorename = $_GET['doctor'];
    $SearchQuery = mysqli_query($db , "SELECT * FROM `sicktable` WHERE `nameofdoctor` = '$doctorename' AND `name` LIKE '%$Data%'");
    if(mysqli_num_rows($SearchQuery) > 0){?>
      <div class="show-our-table">
        <div class="day-of-expense">
          <h1>ئەنجامی گەران</h1>
        </div>
        <table id="customers">
          <tr>
            <th>ناو</th>
            <th>ژمارەی موبایل</th>
            <th>بەروار</th>
            <th>پارەی پێشەکی</th>
            <th>پارەی تەواو</th>
            <th>جۆری کێشەکە</th>
            <th>سەردان</th>
            <th>کردار</th>
            <th>کردار</th>
            <th>بینین</th>
            <th>سڕینەوە</th>
          </tr>
          <?php
          while($SearchRow = mysqli_fetch_assoc($SearchQuery)){?>
            <tr>
              <td><?php echo sec($SearchRow['name']);?></td>
              <td><?php echo sec($SearchRow['phone']);?></td>
              <td><?php echo sec($SearchRow['date']);?></td>
              <td><?php echo sec($SearchRow['firstmoney']);?></td>
              <td><?php echo sec($SearchRow['lastmoney']);?></td>
              <td><?php echo sec($SearchRow['problem']);?></td>
              <td><?php echo sec($SearchRow['visit']);?></td>
              <td data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($SearchRow['id']);?>">دەستکاری</td>
              <td data-bs-toggle="modal" data-bs-target="#gorin<?php echo sec($SearchRow['id']);?>">گورین</td>
              <td><a href="editdoctorsic.php?id=<?php echo sec($SearchRow['id']);?>">بینین</a></td>
              <td>
                <form method="POST" action="modal/sickdata.inc.php">
                  <input type="hidden" name="deletedoc" value="<?php echo sec($SearchRow['nameofdoctor']);?>">
                  <input type="hidden" name="deletid" value="<?php echo sec($SearchRow['id']);?>">
                  <button name="deletesick">سڕینەوە</button>
                </form>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?php echo sec($SearchRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="sickedit">
                      <form method="POST" action="modal/sickdata.inc.php">
                        <input type="hidden" name="namedoc" value="<?php echo sec($SearchRow['nameofdoctor']);?>">
                        <input type="hidden" name="editid" value="<?php echo sec($SearchRow['id']);?>">
                        <div>
                          <h4>بەروار: </h4>
                          <input type="date" name="editdate" value="<?php echo sec($SearchRow['date']);?>">
                        </div>
                        <div>
                          <h4>پارەی پێشەکی  : </h4>
                          <input type="text" name="editfirst" value="<?php echo sec($SearchRow['firstmoney']);?>">
                        </div>
                        <div>
                          <h4>پارەی تەواو : </h4>
                          <input type="text" name="editlast" value="<?php echo sec($SearchRow['lastmoney']);?>">
                        </div>
                        <div>
                          <h4>جۆری کێشەکە : </h4>
                          <input type="text" name="editproblem" value="<?php echo sec($SearchRow['problem']);?>">
                        </div>
                        <div>
                          <h4>سەردان: </h4>
                          <input type="text" name="editvisit" value="<?php echo sec($SearchRow['visit']);?>">
                        </div>
                        <div>
                          <button name="editsick">بگۆرە</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Edit Modal -->
            <div class="modal fade" id="gorin<?php echo sec($SearchRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="sickedit">
                      <form method="POST" action="modal/sickdata.inc.php">
                        <input type="hidden" name="cnamedoc" value="<?php echo sec($SearchRow['nameofdoctor']);?>">
                        <input type="hidden" name="ceditid" value="<?php echo sec($SearchRow['id']);?>">
                        <div>
                          <h4>ناو: </h4>
                          <input type="text" name="ceditname" value="<?php echo sec($SearchRow['name']);?>">
                        </div>
                        <div>
                          <h4>  ژمارەی موبایل: </h4>
                          <input type="text" name="ceditnum" value="<?php echo sec($SearchRow['phone']);?>">
                        </div>
                        <div>
                          <h4>بەروار: </h4>
                          <input type="date" name="ceditdate" value="<?php echo sec($SearchRow['date']);?>">
                        </div>
                        <div>
                          <h4>پارەی پێشەکی  : </h4>
                          <input type="text" name="ceditfirst" value="<?php echo sec($SearchRow['firstmoney']);?>">
                        </div>
                        <div>
                          <h4>پارەی تەواو : </h4>
                          <input type="text" name="ceditlast" value="<?php echo sec($SearchRow['lastmoney']);?>">
                        </div>
                        <div>
                          <h4>جۆری کێشەکە : </h4>
                          <input type="text" name="ceditproblem" value="<?php echo sec($SearchRow['problem']);?>">
                        </div>
                        <div>
                          <h4>سەردان: </h4>
                          <input type="text" name="ceditvisit" value="<?php echo sec($SearchRow['visit']);?>">
                        </div>
                        <div>
                          <button name="ceditsick">بگۆرە</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </table>
        <br>
        <a href="doctorsick.php?doctor=<?php echo sec($doctorename);?>">بگەرێوە</a>
      </div>
      <?php 
    }else{?>
      <h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;">هیچ ناوێک نە دوزرایەوە....</h1>
      <br>
      <center><a href="doctorsick.php?doctor=<?php echo sec($doctorename);?>">بگەرێوە</a></center>
    <?php }
    exit();
  }
  ?>
  <!-- END DATA SEARCH -->
  <table id="customers">
    <tr>
      <th>ناو</th>
      <th>ژمارەی موبایل</th>
      <th>بەروار</th>
      <th>پارەی پێشەکی</th>
      <th>پارەی تەواو</th>
      <th>جۆری کێشەکە</th>
      <th>سەردان</th>
      <th>کردار</th>
      <th>کردار</th>
      <th>بینین</th>
      <th>سڕینەوە</th>
    </tr>
    <?php
    $doctorename = $_GET['doctor'];
    $DoctorQuery = mysqli_query($db , "SELECT * FROM `sicktable` WHERE `nameofdoctor` = '$doctorename'");
    while($DoctorRow = mysqli_fetch_assoc($DoctorQuery)){?>
      <tr>
        <td><?php echo sec($DoctorRow['name']);?></td>
        <td><?php echo sec($DoctorRow['phone']);?></td>
        <td><?php echo sec($DoctorRow['date']);?></td>
        <td><?php echo sec($DoctorRow['firstmoney']);?></td>
        <td><?php echo sec($DoctorRow['lastmoney']);?></td>
        <td><?php echo sec($DoctorRow['problem']);?></td>
        <td><?php echo sec($DoctorRow['visit']);?></td>
        <td data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($DoctorRow['id']);?>">دەستکاری</td>
        <td data-bs-toggle="modal" data-bs-target="#gorin<?php echo sec($DoctorRow['id']);?>">گورین</td>
        <td><a href="editdoctorsic.php?id=<?php echo sec($DoctorRow['id']);?>">بینین</a></td>
        <td>
          <form method="POST" action="modal/sickdata.inc.php">
            <input type="hidden" name="deletedoc" value="<?php echo sec($DoctorRow['nameofdoctor']);?>">
            <input type="hidden" name="deletid" value="<?php echo sec($DoctorRow['id']);?>">
            <button name="deletesick">سڕینەوە</button>
          </form>
        </td>
      </tr>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal<?php echo sec($DoctorRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="sickedit">
                <form method="POST" action="modal/sickdata.inc.php">
                  <input type="hidden" name="namedoc" value="<?php echo sec($DoctorRow['nameofdoctor']);?>">
                  <input type="hidden" name="editid" value="<?php echo sec($DoctorRow['id']);?>">
                  <div>
                    <h4>بەروار: </h4>
                    <input type="date" name="editdate" value="<?php echo sec($DoctorRow['date']);?>">
                  </div>
                  <div>
                    <h4>پارەی پێشەکی  : </h4>
                    <input type="text" name="editfirst" value="<?php echo sec($DoctorRow['firstmoney']);?>">
                  </div>
                  <div>
                    <h4>پارەی تەواو : </h4>
                    <input type="text" name="editlast" value="<?php echo sec($DoctorRow['lastmoney']);?>">
                  </div>
                  <div>
                    <h4>جۆری کێشەکە : </h4>
                    <input type="text" name="editproblem" value="<?php echo sec($DoctorRow['problem']);?>">
                  </div>
                  <div>
                    <h4>سەردان: </h4>
                    <input type="text" name="editvisit" value="<?php echo sec($DoctorRow['visit']);?>">
                  </div>
                  <div>
                    <button name="editsick">بگۆرە</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Edit Modal -->
      <div class="modal fade" id="gorin<?php echo sec($DoctorRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="sickedit">
                <form method="POST" action="modal/sickdata.inc.php">
                  <input type="hidden" name="cnamedoc" value="<?php echo sec($DoctorRow['nameofdoctor']);?>">
                  <input type="hidden" name="ceditid" value="<?php echo sec($DoctorRow['id']);?>">
                  <div>
                    <h4>ناو: </h4>
                    <input type="text" name="ceditname" value="<?php echo sec($DoctorRow['name']);?>">
                  </div>
                  <div>
                    <h4>  ژمارەی موبایل: </h4>
                    <input type="text" name="ceditnum" value="<?php echo sec($DoctorRow['phone']);?>">
                  </div>
                  <div>
                    <h4>بەروار: </h4>
                    <input type="date" name="ceditdate" value="<?php echo sec($DoctorRow['date']);?>">
                  </div>
                  <div>
                    <h4>پارەی پێشەکی  : </h4>
                    <input type="text" name="ceditfirst" value="<?php echo sec($DoctorRow['firstmoney']);?>">
                  </div>
                  <div>
                    <h4>پارەی تەواو : </h4>
                    <input type="text" name="ceditlast" value="<?php echo sec($DoctorRow['lastmoney']);?>">
                  </div>
                  <div>
                    <h4>جۆری کێشەکە : </h4>
                    <input type="text" name="ceditproblem" value="<?php echo sec($DoctorRow['problem']);?>">
                  </div>
                  <div>
                    <h4>سەردان: </h4>
                    <input type="text" name="ceditvisit" value="<?php echo sec($DoctorRow['visit']);?>">
                  </div>
                  <div>
                    <button name="ceditsick">بگۆرە</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </table>


</body>
</html>
