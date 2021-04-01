<?php
include_once("connect.php");
if(isset($_POST['submit'])){
    $id = $_POST['id_employ'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $query = "INSERT INTO employ (id_employ, name, address, tel) VALUES ('$id', '$name', '$address', '$tel')";
    $result = mysqli_query($con, $query);
    if ($result){
        echo "<script>alert('Success')</script>";
    }else{
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
                <h3>พนักงาน</h3>
                <form name="register" action="#" method="POST">

                    <div class="form-group">
                        <input name="id_employ" type="text" required class="form-control" placeholder="รหัสพนักงาน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                    </div>
                     <div class="form-group">
                        <input name="name" type="text" required class="form-control"  placeholder="ชื่อ-สกุล " />
                    </div> 
                    <div class="form-group">
                        <input name="tel" type="text" class="form-control" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control"required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span> สมัครสมาชิก </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
