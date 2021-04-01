<?php
include_once("h.php");
include_once("connect.php");
$id = $_GET['ID'];
if (isset($_POST['submit'])) {
    $form = $_POST['form'];
    $Q_date = $_POST['Q_date'];
    $id_status = $_POST['id_status'];
    $d_price = $price_food * $am_food;
    $query = "INSERT INTO queue (form,Q_date,id_status) VALUES ('$form','$Q_date', '$id_status')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='./list_food.php'</script>";
    } else {
        echo "<script>alert('Something Error')</script>";
    }
}
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">จองคิว</h3>
                <?php

                $select = "SELECT * FROM queue WHERE id_Q = $id";
                $result = mysqli_query($con, $select);
                $row = mysqli_fetch_array($result);
                ?>
                <form name="register" action="#" method="POST">
                    <div class="form-group">
                        <input type="radio" id="form" name="form" value="1" <?php if ($row['form'] == 1) {
                                                                                echo "checked";
                                                                            } ?>>
                        <label for="กลับบ้าน">กลับบ้าน</label><br>
                        <input type="radio" id="form" name="form" value="2" <?php if ($row['form'] == 2) {
                                                                                echo "checked";
                                                                            } ?>>
                        <label for="ทานที่ร้าน">ทานที่ร้าน</label><br>
                    </div>
                    <div class="form-group">
                        <input name="Q_date" type="date" class="form-control" placeholder="" value="<?php echo $row['Q_date'] ?>" />
                    </div>
                    <?php
                    $select = "SELECT * FROM queue INNER JOIN sales_details ON queue.id_Q = sales_details.id_Q INNER JOIN food ON sales_details.id_food = food.id_food INNER JOIN type ON food.id_type = type.id_type where queue.id_Q = $id";
                    $result = mysqli_query($con, $select);
                    echo ' <table class="table table-hover">';
                    echo "
                        <tr>
                        <td>ชื่ออาหาร</td>
                        <td>ราคาต่อชิ้น</td>
                        <td>จำนวน</td>
                        <td></td>
                        <td>ราคารวม</td>
                        <td>delete</td>
                        </tr>";

                    while ($row_food = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row_food["name_food"] .  "</td> ";
                        echo "<td>" . $row_food["price_food"] .  "</td> ";
                        echo "<td>" . $row_food["am_food"] .  "</td> ";
                        echo "<td class='text-center'>" . "<img src='./img/product/" . $row_food["food_img"] .  "' width='70' height='60'> </td> ";
                        echo "<td>" . $row_food["price_food"] .  "</td> ";
                        //ลบข้อมูล
                        echo "<td><a href='del_q.php?ID=$row_food[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                    <div class="form-group">
                        <label for="price_q">ราคารวม</label>
                        <input name="price_q" type="text" required class="form-control" value="<?php echo $row['price_q'] ?>" readonly>
                    </div>

                    <div class="float-left">
                        <a href="print.php?ID=<?php echo $id; ?>" class="btn btn-info"> ยืนยัน </a>
                    </div>

                    <div class="float-right">
                        <a href="in_k.php?ID=<?php echo $id; ?>" class="btn btn-success"> สั่งเพิ่ม </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>