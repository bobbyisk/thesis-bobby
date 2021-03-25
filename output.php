<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>CARecommend</title>
</head>
<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <a class="navbar-brand text-white" href="index.html">CARecommend</a>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link text-white" href="carinfo.php">Car Info</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-auto">
                <a class="nav-link text-white" href="about.html">About</a>
            </li>
        </ul>
    </nav>

    <!--Jumbotron-->
    <?php
    function showCalculation($car_rows, $maxindex){
    ?>
    <div class="container pt-3">
        <div class="jumbotron text-center">
            <h1><pre>Your car recommendation is:</pre></h1>
            <?php echo '<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $car_rows[$maxindex]['car_image'] ).'"/>'."<br>"; ?>
            <h1><kbd><?php echo $car_rows[$maxindex]['car_name'] ?></kbd></h1>
            <h1><kbd><?php echo "Rp. ".$car_rows[$maxindex]['car_price']."0.000" ?></kbd></h1>
<!--            <h1><kbd>--><?php //echo "MOM: ".$highest ?><!--</kbd></h1>-->
            <p></p>
            <a href="index.html" class="btn btn-secondary" role="button">Back to Menu</a>
        </div>
    </div>
    <?php
    }
    ?>

    <?php
    function showTable($sqlall){
    $no = 1;
    $query = mysqli_query($GLOBALS['connect'],$sqlall );
    ?>

    <div class="container pt-3">
        <div class="jumbotron text-center">
            <h1>All Cars:</h1>
            <div class="container">
                <table class="table table-striped table-bordered table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>CC</th>
                        <th>Capacity</th>
                        <th>Tank</th>
                        <th>Torque</th>
                        <th>Power</th>
                        <th>Type</th>
                        <th>Transmittion</th>
                        <th>Gas Type</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['car_name'] ?></td>
                        <td><?php echo $row['car_price'] ?></td>
                        <td><?php echo $row['car_cc'] ?></td>
                        <td><?php echo $row['car_capacity'] ?></td>
                        <td><?php echo $row['car_fueltank'] ?></td>
                        <td><?php echo $row['car_torque'] ?></td>
                        <td><?php echo $row['car_power'] ?></td>
                        <td><?php echo $row['car_type'] ?></td>
                        <td><?php echo $row['car_transmittion'] ?></td>
                        <td><?php echo $row['car_gastype'] ?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['car_image_small'] ).'"/>' ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>