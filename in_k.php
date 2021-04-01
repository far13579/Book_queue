<?php
include_once("connect.php");
$id = $_GET['ID'];
if (isset($_GET['id_food'])) {

    $id_food = $_GET['id_food'];
    $price_food = $_GET['price_food'];
    $am_food = $_GET['am_food'];
    $d_price = $price_food * $am_food;

    $query = "INSERT INTO sales_details ( id_Q, id_food,d_price,am_food) VALUES ('$id', '$id_food', '$d_price', '$am_food')";
    $result = mysqli_query($con, $query);
    $select_detail = "SELECT SUM(d_price) AS Total FROM sales_details WHERE id_Q = $id";
    $result_detail = mysqli_query($con, $select_detail);
    $row_detail = mysqli_fetch_array($result_detail);
    $total = $row_detail['Total'];
    $query_queue = "UPDATE queue SET price_q = '$total' WHERE id_Q = $id";
    $result_queue = mysqli_query($con, $query_queue);
    if ($result) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='./out_q.php?ID=$id'</script>";
    } else {
        echo "<script>alert('Something Error')</script>";
    }
}
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
                <form name="register" method="GET" action="">
                    <div class="form-row">
                        <!-- <div class="col-md-6 mb-3">
                            <input name="id_sales" type="text" required class="form-control" placeholder="รหัสการขาย" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                        </div> -->
                        <div class="col-md-6 mb-3">
                            <input name="id_Q" type="text" required class="form-control" placeholder="รหัสคิว" value="<?php echo $id; ?>" readonly />

                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $select = "SELECT * FROM food";
                        $result = mysqli_query($con, $select);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <img class="card-img-top" src="./img/<?php echo $row['food_img']; ?>" height="230px">
                                    <div class="card-body">
                                        <input type="hidden" name="id_food" value="<?php echo $row['id_food']; ?>">
                                        <h5 class="card-title"><?php echo $row['name_food']; ?></h5>
                                        <h3><?php echo $row['price_food']; ?></h3>
                                        <input type="hidden" name="price_food" value="<?php echo $row['price_food']; ?>">
                                        <a href="in_k.php?ID=<?php echo $id; ?>&id_food=<?php echo $row['id_food']; ?>&am_food=1&price_food=<?php echo $row['price_food']; ?>" class="btn btn-primary" name="buy">Buy</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>