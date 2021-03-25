<?php
    session_start();
    include("connection.php");

    $name = '';
    $price = '';
    $cc = '';
    $capacity = '';
    $fueltank = '';
    $torque = '';
    $power = '';
    $type = '';
    $transmittion = '';
    $gastype = '';
    $id = '';

    if(isset($_POST['submit'])){
        $car_name_calc = $_POST['car_name_calc'];
        $car_price_calc = $_POST['car_price_calc'];
        $car_price_calc = $car_price_calc / 1000000;
        $car_cc_calc = $_POST['car_cc_calc'];
        $car_capacity_calc = $_POST['car_capacity_calc'];
        $car_fueltank_calc = $_POST['car_fueltank_calc'];
        $car_torque_calc = $_POST['car_torque_calc'];
        $car_power_calc = $_POST['car_power_calc'];
        $car_type_calc = $_POST['car_type_calc'];
        $car_transmittion_calc = $_POST['car_transmittion_calc'];
        $car_gastype_calc = $_POST['car_gastype_calc'];

        $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imagetmp_small = addslashes(file_get_contents($_FILES['image_small']['tmp_name']));

        $sql = "INSERT INTO car_calculation (car_name, car_price, car_cc, 
                                             car_capacity, car_fueltank, car_torque, 
                                             car_power, car_type, car_transmittion, 
                                             car_gastype, car_image, car_image_small)
                VALUES('$car_name_calc', '$car_price_calc', '$car_cc_calc', 
                       '$car_capacity_calc', '$car_fueltank_calc', '$car_torque_calc', 
                       '$car_power_calc', '$car_type_calc', '$car_transmittion_calc', 
                       '$car_gastype_calc', '$imagetmp', '$imagetmp_small')";
        $add = $connect->query($sql);

        if ($add){
            echo "<script type='text/javascript'>alert('File added successfully!')</script>";
            echo "<script language='javascript' type='text/javascript'> location.href='admin_modify.php' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Failed to add.')</script>";
        }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM car_calculation WHERE ID = '$id'";
        $delete = $connect->query($sql);

        if ($delete){
            echo "<script type='text/javascript'>alert('Record has ben deleted.')</script>";
            echo "<script language='javascript' type='text/javascript'> location.href='admin_modify.php'</script>";
        }
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result = true;
        $sql = "SELECT * FROM car_calculation WHERE ID = '$id'";
        $edit = $connect->query($sql);

        if(count($edit) == 1){
            $row = mysqli_fetch_array($edit);
            $name = $row['car_name'];
            $price = $row['car_price'];
            $price = $price * 1000000;
            $cc = $row['car_cc'];
            $capacity = $row['car_capacity'];
            $fueltank = $row['car_fueltank'];
            $torque = $row['car_torque'];
            $power = $row['car_power'];
            $type = $row['car_type'];
            $transmittion = $row['car_transmittion'];
            $type = $row['car_gastype'];
            $image = $row['car_image'];
        }
    }

    if(isset($_POST['modify'])){ // post method dg name modify
        $id = $_POST['id'];
        $car_name_calc = $_POST['car_name_calc'];
        $car_price_calc = $_POST['car_price_calc'];
        $car_price_calc = $car_price_calc / 1000000;
        $car_cc_calc = $_POST['car_cc_calc'];
        $car_capacity_calc = $_POST['car_capacity_calc'];
        $car_fueltank_calc = $_POST['car_fueltank_calc'];
        $car_torque_calc = $_POST['car_torque_calc'];
        $car_power_calc = $_POST['car_power_calc'];
        $car_type_calc = $_POST['car_type_calc'];
        $car_transmittion_calc = $_POST['car_transmittion_calc'];
        $car_gastype_calc = $_POST['car_gastype_calc'];

        $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imagetmp_small = addslashes(file_get_contents($_FILES['image_small']['tmp_name']));

        $sql = "UPDATE car_calculation SET car_name = '$car_name_calc', car_price = '$car_price_calc', car_cc = '$car_cc_calc',
                                           car_capacity = '$car_capacity_calc', car_fueltank = '$car_fueltank_calc', 
                                           car_torque = '$car_torque_calc', car_power = '$car_power_calc',
                                           car_type = '$car_type_calc', car_transmittion = '$car_transmittion_calc', 
                                           car_gastype = '$car_gastype_calc', car_image = '$imagetmp', car_image_small = '$imagetmp_small' WHERE ID = '$id'";

        $result = $connect->query($sql);

        if($result){
            echo "<script type='text/javascript'>alert('Record has ben modofied.')</script>";
            echo "<script language='javascript' type='text/javascript'> location.href='admin_modify.php'</script>";
        }else{
            die('Could not update.' . mysqli_error());
        }
    }
?>