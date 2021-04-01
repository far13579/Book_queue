<?php
include_once("connect.php");
$id = $_GET['ID'];
if (isset($_POST['submit'])) {
    $id_type = $_POST['id_type'];
    $name_type = $_POST['name_type'];
    $query = "UPDATE type SET id_type='$id_type', name_type='$name_type' WHERE id_type='$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='./list_p.php'</script>";
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
            <div class="col-md-3">
                <h3 class="text-center">ประเภทอาหาร</h3>
                <?php
                
                $select = "SELECT * FROM type WHERE id_type = $id";
                $result = mysqli_query($con, $select);
                $row = mysqli_fetch_array($result);
                ?>
                <form name="register" action="" method="POST">
                    <div class="form-group">
                        <input name="id_type" type="text" required class="form-control" placeholder="รหัสประเภทอาหาร" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="1" value="<?php echo $row['id_type'] ?>"/>
                    </div>
                    <div class="form-group">
                        <input name="name_type" type="text" required class="form-control" placeholder="ชื่อประเภทอาหาร " value="<?php echo $row['name_type'] ?>"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span> submit </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
<!-- <script>
    document.querySelector("#Q_date").valueAsDate = new Date();
</script> -->