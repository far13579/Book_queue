<?php
include_once("h.php");
include_once("connect.php");
$select = "SELECT * FROM queue";
$result = mysqli_query($con, $select);
echo ' <table class="table table-hover">';
//หัวข้อตาราง 
echo "
<tr>
<td>id</td>
<td>form</td>
<td>Q_date</td>
<td>status</td>
<td>edit</td>
<td>delete</td>
</tr>";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row["id_Q"] .  "</td> ";
  echo "<td>" . $row["form"] .  "</td> ";
  echo "<td>" . $row["Q_date"] .  "</td> ";
  echo "<td>" . $row["id_status"] .  "</td> ";
  //แก้ไขข้อมูล
  echo "<td><a href='out_q.php?ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";

  //ลบข้อมูล
  echo "<td><a href='del_q.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>