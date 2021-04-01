<?php
include_once("connect.php");
$id = $_GET['ID'];
$select = "SELECT * FROM food WHERE id_food = $id";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
    $id_food = $_POST['id_food'];
    $name_food = $_POST['name_food'];
    $price_food = $_POST['price_food'];
    if (isset($_FILES['upload']) && $_FILES['upload']['name'] != '') {
        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img = "./img/product/";
        move_uploaded_file($tmp_name, $locate_img . $name_file);
    } else {
        $name_file = $row['food_img'];
    }
    $id_type = $_POST['id_type'];
    $query = $sql = "UPDATE food SET id_food='$id_food',name_food='$name_food', price_food='$price_food',food_img='$name_file',id_type='$id_type' WHERE id_food='$id'";
    // $query = "INSERT INTO food (id_food, name_food, price_food, food_img,id_type) VALUES ('$id_food', '$name_food', '$price_food', '$name_file', '$id_type')";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='./list_food.php'</script>";
    } else {
        echo "<script>alert('Something Error')</script>";
    }
}
?>
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
                <h3>อาหาร</h3>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input name="id_food" type="text" required class="form-control" placeholder="รหัสอาหาร" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" value="<?php echo $row['id_food'] ?>" />
                    </div>
                    <div class="form-group">
                        <input name="name_food" type="text" required class="form-control" placeholder="ชื่ออาหาร" value="<?php echo $row['name_food'] ?>" />
                    </div>
                    <div class="form-group">
                        <input name="price_food" type="text" class="form-control" placeholder="ราคาอาหาร" value="<?php echo $row['price_food'] ?>" />
                    </div>
                    <!-- <div class="form-group">
                        <textarea name="food_img"  type="text" class="form-control"required></textarea>
                    </div> -->

                    <div class="form-group">
                        <input type="radio" id="id_type" name="id_type" value="1" <?php if ($row['id_type'] == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                        <label for="อาหารคาว">อาหารคาว</label><br>
                        <input type="radio" id="id_type" name="id_type" value="2" <?php if ($row['id_type'] == 2) {
                                                                                        echo "checked";
                                                                                    } ?>>
                        <label for="อาหารหวาน">อาหารหวาน</label><br>
                    </div>
                    <div class="form-group">
                        <img src="./img/product/<?php echo $row['food_img']; ?>" alt="" width="70px" height="80px">
                        <input type="file" name="upload">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span> ยืนยัน </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>