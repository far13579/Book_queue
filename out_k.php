<?php
include_once("connect.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id_Q'];
    $id_details = $_POST['id_details'];
    $id_food = $_POST['id_food'];
    $name_food = $_POST['name_food'];
    $d_price = $_POST['d_price'];
    $am_food = $_POST['am_food'];

    $query = "INSERT INTO sales_details ( id_Q, id_details, id_food,name_food,d_price,am_food) VALUES ('$id', '$id_details', '$id_food', '$name_food''$d_price', '$am_food')";
    $result = mysqli_query($con, $query);
    $id_sale = mysqli_insert_id($con);
    if ($result) {
        echo "<script>alert('Success')</script>";
        // echo "<script>window.location.href='./in_d.php?ID=$id_sale'</script>";
    } else {
        echo "<script>alert('Something Error')</script>";
    }
}
// echo $_GET['ID'];
$id_Q = $_GET['ID'];
?>


<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <style type="text/css">
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- <h1>Love ...</h1> -->
                <h3>รายละเอียดการขาย</h3>
                <form name="register" method="POST" action="">
                    <div class="form-row">
                        <!-- <div class="col-md-6 mb-3">
                            <input name="id_sales" type="text" required class="form-control" placeholder="รหัสการขาย" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                        </div> -->
                        <div class="col-md-6 mb-3">
                        <input name="id_Q" type="text" required class="form-control" placeholder="รหัสคิว" value="<?php echo $_GET['ID']; ?>" />
  
                                       </div>
                        <div class="col-md-6 mb-3">
                        <input name="id_details" type="text" class="form-control" placeholder="รหัสรายละเอียดเมนู" value="<?php echo $row['name_type'] ?>"/>
     
                                                  </div>
                    </div>

                    <!-- <div class="form-group">
                        <input name="id_employ" type="text" class="form-control" placeholder="รหัสรายละเอียดเมนู" />
                    </div> -->
                    <div class="form-group">
                        <input name="id_food" class="form-control" required placeholder="รหัสอาหาร" ></input>
                    </div>
                    <div class="form-group">
                        <input name="name_food" class="form-control" required placeholder="ชื่ออาหาร"></input>
                    </div>
                    <div class="form-group">
                        <input name="d_price" class="form-control" required placeholder="ราคาอาหาร" ></input>
                    </div>
                    <div class="form-group"> 
                        <input name="am_food" class="form-control" required placeholder="จำนวนอาหาร" ></input>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span> ยืนยันการสั่งอาหาร </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>