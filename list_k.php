<!DOCTYPE html>
<html lang="en">

<head>
  <!--start data table-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
  </script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "aaSorting": [
          [0, 'desc']
        ],
        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
      });
    });
  </script>
  <!-- end data table -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    @font-face {
      font-family: sansation;
      src: url(sansation_light.woff);
    }

    body {
      font-family: sansation;
    }
  </style>
</head>

<body>
  <div class="text-right">
    <a class="btn btn-primary" href="#" role="button">เพิ่ม</a>
  </div>
  <meta charset="UTF-8">
  <?php
  // include('h.php');
  error_reporting(error_reporting() & ~E_NOTICE);
  //1. เชื่อมต่อ database:
  include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //2. query ข้อมูลจากตาราง tb_admin:
  $query = "SELECT * FROM sales_details ORDER BY id_details ASC";
  //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
  $result = mysqli_query($con, $query);
  //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
  $row_am = mysqli_fetch_assoc($result);
  ?>

  <script>
    $(document).ready(function() {
      $('#example1').DataTable({
        "aaSorting": [
          [0, 'ASC']
        ],
        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
      });
    });
  </script>

  <table border="2" class="display table table-bordered" id="example1" align="center">
    <thead>
      <tr class="info">
        <th>รหัสคิว</th>  
        <th>รหัสรายละเอียดเมนู</th>
        <th>รหัสอาหาร</th>
        <th>ชื่ออาหาร</th>
        <th>ราคาอาหาร</th>
        <th>จำนวนอาหาร</th>
        <td>edit</td>
        <td>delete</td>

      </tr>
    </thead>
    <?php do { ?>

      <tr>
        <td><?php echo $row_am['id_Q']; ?></td>
        <td><?php echo $row_am['id_details']; ?></td>
        <td><?php echo $row_am['id_food']; ?></td>
        <td><?php echo $row_am['name_food']; ?></td>
        <td><?php echo $row_am['d_price']; ?></td>
        <td><?php echo $row_am['am_food']; ?></td>
        <td><a href="out_k.php?&ID=<?php echo $row_am['id_details']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
        <td><a href="del_k.php?ID=<?php echo $row_am['id_details']; ?>" class='btn btn-danger btn-xs' onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
      </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>

  </table>

</body>

</html>