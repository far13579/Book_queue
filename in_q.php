<?php
include_once("connect.php");
if (isset($_POST['submit'])) {
    $form = $_POST['form'];
    $Q_date = $_POST['Q_date'];
    $id_status = 1;
    $query = "INSERT INTO queue (form,Q_date,id_status) VALUES ('$form','$Q_date', '$id_status')";
    $result = mysqli_query($con, $query);
    $id = mysqli_insert_id($con);
    if ($result) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='./in_k.php?ID=$id'</script>";
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
                <h3 class="text-center">จองคิว</h3>

                <form name="register" action="" method="POST">
                    <!-- <div class="float-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Love ..." name="">
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <input name="id_Q" type="text" required class="form-control" placeholder="คิวที่" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                    </div> -->
                    <div class="form-group">
                    <input type="radio" id="form" name="form" value="1">
                        <label for="กลับบ้าน">กลับบ้าน</label><br>
                        <input type="radio" id="form" name="form" value="2">
                        <label for="ทานที่ร้าน">ทานที่ร้าน</label><br>
                    </div>
                    <div class="form-group">
                        <input name="Q_date" id="Q_date" type="date" class="form-control" placeholder="" />
                    </div>
                    <!-- <div class="form-group">
                        <input type="radio" id="status" name="status" value="1">
                        <label for="กำลังจอง">กำลังจอง</label><br>
                        <input type="radio" id="status" name="status" value="2">
                        <label for="จองแล้ว">จองแล้ว</label><br>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span> submit </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
<script>
    document.querySelector("#Q_date").valueAsDate = new Date();
</script>