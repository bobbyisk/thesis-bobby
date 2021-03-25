<?php
    include('connection.php');
    include_once('calculate_function.php');

    error_reporting(0); // Turn off all error reporting

    $pricelow = $_POST['pricelow']; //variabel ambil dari html
    $pricehigh = $_POST['pricehigh']; //variabel ambil dari html
    $cclow = $_POST['cclow'];
    $cchigh = $_POST['cchigh'];
    $seatlow = $_POST['seatlow'];
    $seathigh = $_POST['seathigh'];
    $tanklow = 33;
    $tankhigh = 93;
    $torquelow = 86;
    $torquehigh = 450;
    $powerlow = 64;
    $powerhigh = 286;

    if($pricelow != NULL && $pricehigh != NULL){
        $pricelow = $pricelow / 1000000;
        $pricehigh = $pricehigh / 1000000;
    }

    $cartype = $_POST['cartype'];
    $cartransmittion = $_POST['transmittion'];
    $cargastype = $_POST['gastype'];

    $sql = "SELECT *
            FROM car_calculation
            WHERE car_price >= '$pricelow' AND car_price <= '$pricehigh'
            AND car_cc >= '$cclow' AND car_cc <= '$cchigh'
            AND car_capacity >= '$seatlow' AND car_capacity <= '$seathigh'
            AND car_fueltank >= '$tanklow' AND car_fueltank <= '$tankhigh'
            AND car_torque >= '$torquelow' AND car_torque <= '$torquehigh'
            AND car_power >= '$powerlow' AND car_power <= '$powerhigh'"; // buat deklarasi variabel sql

    $sqlall = "SELECT * FROM car_calculation";

    if($cartype == "All" AND $cartransmittion == "All" AND $cargastype == "All"){
        $sql;
    }else if($cartype == "All" AND $cartransmittion == "All"){
        $sql = $sql." AND car_gastype = '$cargastype'";
    }else if($cartype == "All" AND $cargastype == "All") {
        $sql = $sql." AND car_transmittion = '$cartransmittion'";
    }else if($cartransmittion == "All" AND $cargastype == "All"){
        $sql = $sql." AND car_type = '$cartype'";
    }else if($cartype == "All"){
        $sql = $sql." AND car_transmittion = '$cartransmittion' AND car_gastype = '$cargastype'";
    }else if($cartransmittion == "All"){
        $sql = $sql." AND car_type = '$cartype' AND car_gastype = '$cargastype'";
    }else if($cargastype == "All"){
        $sql = $sql." AND car_type = '$cartype' AND car_transmittion = '$cartransmittion'";
    }else{
        $sql = $sql." AND car_type = '$cartype' AND car_transmittion = '$cartransmittion' AND car_gastype = '$cargastype'";
    }

    if($pricelow == NULL && $pricehigh == NULL && $cclow == NULL && $cchigh == NULL && $seatlow == NULL && $seathigh == NULL){
        echo getAllCar($sqlall);
    }else{
        $result = $connect->query($sql); //koneksi ke data base (connection executes query) | execute the $sql query and store it in result
        echo calculateCar($result);
    }
?>