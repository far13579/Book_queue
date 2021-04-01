<?php

include('connect.php');

$id = $_GET["ID"];
$sql = "SELECT * FROM queue INNER JOIN sales_details ON queue.id_Q = sales_details.id_Q INNER JOIN food ON sales_details.id_food = food.id_food INNER JOIN type ON food.id_type = type.id_type where queue.id_Q = $id";
$result2 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result2);
?>
<?php
include('h.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table,
        th,
        td {
            border: 0px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        @media print {
            .noprint {
                display: none;
            }

        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<!-- <body style="background-image: url('img/bak.png');"> -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-12">จองคิว</h1>

                            <table style="width:100%">
                                <tr>
                                    <td text-align="center">คิว</td>
                                    <td></td>
                                <td text-align="center"><?php echo $row['id_Q']; ?></td>
                                </tr>

                                <tr>
                                    <td text-align="center">ชื่ออาหาร</td>
                                    <td></td>
                                    <td text-align="center"><?php echo $row['name_food']; ?> </td>
                                </tr>

                                <tr>
                                    <td text-align="center">ราคาต่อชิ้น</td>
                                    <td></td>
                                    <td text-align="center"><?php echo $row['price_food']; ?></td>
                                </tr>

                                <tr>
                                    <td text-align="center">จำนวน</td>
                                    <td></td>
                                    <td text-align="center"><?php echo $row['am_food']; ?></td>
                                </tr>

                                <tr>
                                    <td text-align="center">ราคารวม</td>
                                    <td></td>
                                    <td text-align="center"><?php echo $row['price_q']; ?></td>
                                </tr>

                                
                                <tr>
                                    <td text-align="center">วันที่</td>
                                    <td></td>
                                    <td text-align="center"><?php echo $row['Q_date']; ?></td>
                                </tr>

                                                           
                            </table>
                            <br>
                            <div class="noprint">
                            <a href="javascript:if(window.print)window.print()" class="list-group-item list-group-item-action">Print</a>
                            </div>
                            
                            <div class="noprint">
                                <a href="in_q.php" class="list-group-item list-group-item-action list-group-item-danger">กลับ</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>