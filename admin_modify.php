<?php
include("connection.php");
include("admin_process_data.php");

if(!isset($_SESSION['username'])) {
    header('location:admin_login.php');
} else {
    $username = $_SESSION['username'];
}
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
        <a class="navbar-brand text-white">CARecommend</a>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_add.php">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Modify</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-auto">
                <a class="nav-link text-white" href="admin_logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div align='center'>
        Welcome, <b><?php echo $username.".";?></b>
    </div>

    <div class="container pt-3">
        <div class="jumbotron text-center">
            <form action="admin_process_data.php" method="post" enctype="multipart/form-data">
                <h1><b>MODIFY CAR DATA</b></h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" value="<?php echo $name ?>"placeholder="Car Name" name="car_name_calc" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" value="<?php echo $price ?>"placeholder="Car Price" name="car_price_calc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" value="<?php echo $cc ?>" placeholder="Car CC" name="car_cc_calc" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" value="<?php echo $capacity ?>" placeholder="Car Capacity" name="car_capacity_calc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" value="<?php echo $fueltank ?>" placeholder="Car Fueltank" name="car_fueltank_calc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" value="<?php echo $torque ?>" placeholder="Car Torque" name="car_torque_calc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" value="<?php echo $power ?>" placeholder="Car Power" name="car_power_calc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cartype">Car Type:</label>
                        <select class="form-control" name="car_type_calc">
                            <option value="HATCHBACK">HATCHBACK</option>
                            <option value="VAN">VAN</option>
                            <option value="SUV">SUV</option>
                            <option value="MPV">MPV</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="transmittion">Transmittion:</label>
                        <select class="form-control" name="car_transmittion_calc">
                            <option value="AUTOMATIC">AUTOMATIC</option>
                            <option value="MANUAL">MANUAL</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gastype">Gas Type:</label>
                        <select class="form-control" name="car_gastype_calc">
                            <option value="BENSIN">BENSIN</option>
                            <option value="DIESEL">DIESEL</option>
                        </select>
                    </div>
                </div>
                <p>Image Big</p>
                <input type="file" name="image" value="" required />
                <p>Image Small</p>
                <input type="file" name="image_small" value="" required />
                <input type="hidden" name = "id" value="<?php echo $_GET['edit']; ?>"/>
                <p></p>
                <input type="submit" name="modify" class="btn btn-secondary" value="Modify" />
            </form>
        </div>
    </div>

    <!--Jumbotron-->
    <div class="container pt-3">
        <div class="jumbotron text-center">
            <div class="container">
                <table class="table table-striped table-bordered table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
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
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($connect, "SELECT * FROM car_calculation");

                    while($row = mysqli_fetch_array($query)){
                    ?>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['car_image_small'] ).'"/>' ?></td>
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
                        <td>
                            <a href="admin_modify.php?edit=<?php echo $row['ID'] ?>" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="admin_process_data.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger">Delete</a>
                        </td>
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

