<?php
include_once("h.php");
include_once("connect.php");
$select = "SELECT * FROM food";
$result = mysqli_query($con, $select);
echo ' <table class="table table-hover">';
//หัวข้อตาราง 
echo "
<tr>
<td></td>
<td>ชื่ออาหาร</td>
<td>ราคา</td>
<td>ประเภท</td>
<td>edit</td>
<td>delete</td>
</tr>";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td class='text-center'>" . "<img src='./img/product/". $row["food_img"] .  "' width='70' height='60'> </td> ";
  echo "<td>" . $row["name_food"] .  "</td> ";
  echo "<td>" . $row["price_food"] .  "</td> ";
  echo "<td>" . $row["id_type"] .  "</td> ";

  //แก้ไขข้อมูล
  echo "<td><a href='out_food.php?ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";

  //ลบข้อมูล
  echo "<td><a href='del_food.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>

 <!-- <div class="form-group">
 <a href="" class="btn btn-primary btn-lg btn-block">ยืนยัน</a> </div>
  -->