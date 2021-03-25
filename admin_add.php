<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:admin_login.php');
    } else {
        $username = $_SESSION['username'];
    }
    ?>

    <title>Admin CARecommend</title>
</head>
<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <a class="navbar-brand text-white">CARecommend</a>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link text-white" href="">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_modify.php">Modify</a>
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

    <!--Jumbotron-->
    <div class="container pt-3">
        <div class="jumbotron text-center">
            <form action="admin_process_data.php" method="post" enctype="multipart/form-data">
                <h1><b>ADD CAR DATA</b></h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Car Name" name="car_name_calc" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Car Price" name="car_price_calc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Car CC" name="car_cc_calc" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Car Capacity" name="car_capacity_calc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Car Fueltank" name="car_fueltank_calc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Car Torque" name="car_torque_calc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Car Power" name="car_power_calc" required>
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
                <input type="file" name="image" required />
                <p>Image Small</p>
                <input type="file" name="image_small" required />
                <p></p>
                <input type="submit" name="submit" class="btn btn-secondary" value="Add" />
            </form>
        </div>
    </div>
</body>
</html>