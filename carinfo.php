<?php
    error_reporting(0);
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Car Info</title>
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
    <div class="container pt-3">
        <div class="jumbotron text-center">
            <img src="car.jpg" class="img-thumbnail" alt="Error" width="304" height="236">
            <h1>Car Info</h1>
            <p>Search car that you wanted to know.</p>
            <form action="" class="input-group mb-3" method="POST">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-outline-secondary" name="submit" value="Submit" />
                </div>
            </form>
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
                        <th></th>
                    </tr>
                    <?php
                    $no = 1;
                    $search = $_POST['search'];

                    if($search != ""){
                        $query = mysqli_query($connect, "SELECT * FROM car_calculation WHERE car_name LIKE '%$search%'");
                    }else{
                        $query = mysqli_query($connect, "SELECT * FROM car_calculation");
                    }
                    while($row = mysqli_fetch_array($query)){
                    ?>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['car_name'] ?></td>
                        <td><?php echo "Rp. ".$row['car_price']*1000000 ?></td>
                        <td><?php echo $row['car_cc']." cc" ?></td>
                        <td><?php echo $row['car_capacity'] ?></td>
                        <td><?php echo $row['car_fueltank']." L" ?></td>
                        <td><?php echo $row['car_torque']." Nm"?></td>
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
</body>
</html>

