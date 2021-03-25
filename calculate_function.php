<?php
include("connection.php");
include("output.php");

function getAllCar($sqlall){
    echo showTable($sqlall);
}

function calculateCar($result){
    $minimum = 0;
    $maximum = 100;
//    $price = '';
    $data = [];
    $car_rows = [];
//    $carimage = [];

    while($row=mysqli_fetch_assoc($result)){ // semua
        $price = $row['car_price'];
        $cc = $row['car_cc'];
        $seat = $row['car_capacity'];
        $tank = $row['car_fueltank'];
        $torque = $row['car_torque'];
        $power = $row['car_power'];
//        $type = $row['car_type'];
//        $transmittion = $row['car_transmittion'];
//        $gastype = $row['car_gastype'];

        // FUZZIFICATION
        $price_cheap = round(($GLOBALS['pricehigh'] - $price)/($GLOBALS['pricehigh'] - $GLOBALS['pricelow']), 2);
        $price_expensive = round(($price - $GLOBALS['pricelow'])/($GLOBALS['pricehigh'] - $GLOBALS['pricelow']), 2);
        $cc_low = round(($GLOBALS['cchigh'] - $cc)/($GLOBALS['cchigh'] - $GLOBALS['cclow']), 2);
        $cc_high = round(($cc - $GLOBALS['cclow'])/($GLOBALS['cchigh'] - $GLOBALS['cclow']), 2);
        $seat_low = round(($GLOBALS['seathigh'] - $seat)/($GLOBALS['seathigh'] - $GLOBALS['seatlow']), 2);
        $seat_high = round(($seat - $GLOBALS['seatlow'])/($GLOBALS['seathigh'] - $GLOBALS['seatlow']), 2);
        $tank_low = round(($GLOBALS['tankhigh'] - $tank)/($GLOBALS['tankhigh'] - $GLOBALS['tanklow']), 2);
        $tank_high = round(($tank - $GLOBALS['tanklow'])/($GLOBALS['tankhigh'] - $GLOBALS['tanklow']), 2);
        $torque_low = round(($GLOBALS['torquehigh'] - $torque)/($GLOBALS['torquehigh'] - $GLOBALS['torquelow']), 2);
        $torque_high = round(($torque - $GLOBALS['torquelow'])/($GLOBALS['torquehigh'] - $GLOBALS['torquelow']), 2);
        $power_low = round(($GLOBALS['powerhigh'] - $power)/($GLOBALS['powerhigh'] - $GLOBALS['powerlow']), 2);
        $power_high = round(($power - $GLOBALS['powerlow'])/($GLOBALS['powerhigh'] - $GLOBALS['powerlow']), 2);

        // INFERENCE
        // Fire Strength
        // Price cheap
        $R1 = min($price_cheap, $cc_low, $seat_low, $tank_low, $torque_low, $power_low);
        $R2 = min($price_cheap, $cc_low, $seat_low, $tank_low, $torque_low, $power_high);
        $R3 = min($price_cheap, $cc_low, $seat_low, $tank_low, $torque_high, $power_low);
        $R4 = min($price_cheap, $cc_low, $seat_low, $tank_low, $torque_high, $power_high);
        $R5 = min($price_cheap, $cc_low, $seat_low, $tank_high, $torque_low, $power_low);
        $R6 = min($price_cheap, $cc_low, $seat_low, $tank_high, $torque_low, $power_high);
        $R7 = min($price_cheap, $cc_low, $seat_low, $tank_high, $torque_high, $power_low);
        $R8 = min($price_cheap, $cc_low, $seat_low, $tank_high, $torque_high, $power_high);
        $R9 = min($price_cheap, $cc_low, $seat_high, $tank_low, $torque_low, $power_low);
        $R10 = min($price_cheap, $cc_low, $seat_high, $tank_low, $torque_low, $power_high);
        $R11 = min($price_cheap, $cc_low, $seat_high, $tank_low, $torque_high, $power_low);
        $R12 = min($price_cheap, $cc_low, $seat_high, $tank_low, $torque_high, $power_high);
        $R13 = min($price_cheap, $cc_low, $seat_high, $tank_high, $torque_low, $power_low);
        $R14 = min($price_cheap, $cc_low, $seat_high, $tank_high, $torque_low, $power_high);
        $R15 = min($price_cheap, $cc_low, $seat_high, $tank_high, $torque_high, $power_low);
        $R16 = min($price_cheap, $cc_low, $seat_high, $tank_high, $torque_high, $power_high);
        $R17 = min($price_cheap, $cc_high, $seat_low, $tank_low, $torque_low, $power_low);
        $R18 = min($price_cheap, $cc_high, $seat_low, $tank_low, $torque_low, $power_high);
        $R19 = min($price_cheap, $cc_high, $seat_low, $tank_low, $torque_high, $power_low);
        $R20 = min($price_cheap, $cc_high, $seat_low, $tank_low, $torque_high, $power_high);
        $R21 = min($price_cheap, $cc_high, $seat_low, $tank_high, $torque_low, $power_low);
        $R22 = min($price_cheap, $cc_high, $seat_low, $tank_high, $torque_low, $power_high);
        $R23 = min($price_cheap, $cc_high, $seat_low, $tank_high, $torque_high, $power_low);
        $R24 = min($price_cheap, $cc_high, $seat_low, $tank_high, $torque_high, $power_high);
        $R25 = min($price_cheap, $cc_high, $seat_high, $tank_low, $torque_low, $power_low);
        $R26 = min($price_cheap, $cc_high, $seat_high, $tank_low, $torque_low, $power_high);
        $R27 = min($price_cheap, $cc_high, $seat_high, $tank_low, $torque_high, $power_low);
        $R28 = min($price_cheap, $cc_high, $seat_high, $tank_low, $torque_high, $power_high);
        $R29 = min($price_cheap, $cc_high, $seat_high, $tank_high, $torque_low, $power_low);
        $R30 = min($price_cheap, $cc_high, $seat_high, $tank_high, $torque_low, $power_high);
        $R31 = min($price_cheap, $cc_high, $seat_high, $tank_high, $torque_high, $power_low);
        $R32 = min($price_cheap, $cc_high, $seat_high, $tank_high, $torque_high, $power_high);

        //---------------------------------------------------------------------------------//

        $R33 = min($price_expensive, $cc_low, $seat_low, $tank_low, $torque_low, $power_low);
        $R34 = min($price_expensive, $cc_low, $seat_low, $tank_low, $torque_low, $power_high);
        $R35 = min($price_expensive, $cc_low, $seat_low, $tank_low, $torque_high, $power_low);
        $R36 = min($price_expensive, $cc_low, $seat_low, $tank_low, $torque_high, $power_high);
        $R37 = min($price_expensive, $cc_low, $seat_low, $tank_high, $torque_low, $power_low);
        $R38 = min($price_expensive, $cc_low, $seat_low, $tank_high, $torque_low, $power_high);
        $R39 = min($price_expensive, $cc_low, $seat_low, $tank_high, $torque_high, $power_low);
        $R40 = min($price_expensive, $cc_low, $seat_low, $tank_high, $torque_high, $power_high);
        $R41 = min($price_expensive, $cc_low, $seat_high, $tank_low, $torque_low, $power_low);
        $R42 = min($price_expensive, $cc_low, $seat_high, $tank_low, $torque_low, $power_high);
        $R43 = min($price_expensive, $cc_low, $seat_high, $tank_low, $torque_high, $power_low);
        $R44 = min($price_expensive, $cc_low, $seat_high, $tank_low, $torque_high, $power_high);
        $R45 = min($price_expensive, $cc_low, $seat_high, $tank_high, $torque_low, $power_low);
        $R46 = min($price_expensive, $cc_low, $seat_high, $tank_high, $torque_low, $power_high);
        $R47 = min($price_expensive, $cc_low, $seat_high, $tank_high, $torque_high, $power_low);
        $R48 = min($price_expensive, $cc_low, $seat_high, $tank_high, $torque_high, $power_high);
        $R49 = min($price_expensive, $cc_high, $seat_low, $tank_low, $torque_low, $power_low);
        $R50 = min($price_expensive, $cc_high, $seat_low, $tank_low, $torque_low, $power_high);
        $R51 = min($price_expensive, $cc_high, $seat_low, $tank_low, $torque_high, $power_low);
        $R52 = min($price_expensive, $cc_high, $seat_low, $tank_low, $torque_high, $power_high);
        $R53 = min($price_expensive, $cc_high, $seat_low, $tank_high, $torque_low, $power_low);
        $R54 = min($price_expensive, $cc_high, $seat_low, $tank_high, $torque_low, $power_high);
        $R55 = min($price_expensive, $cc_high, $seat_low, $tank_high, $torque_high, $power_low);
        $R56 = min($price_expensive, $cc_high, $seat_low, $tank_high, $torque_high, $power_high);
        $R57 = min($price_expensive, $cc_high, $seat_high, $tank_low, $torque_low, $power_low);
        $R58 = min($price_expensive, $cc_high, $seat_high, $tank_low, $torque_low, $power_high);
        $R59 = min($price_expensive, $cc_high, $seat_high, $tank_low, $torque_high, $power_low);
        $R60 = min($price_expensive, $cc_high, $seat_high, $tank_low, $torque_high, $power_high);
        $R61 = min($price_expensive, $cc_high, $seat_high, $tank_high, $torque_low, $power_low);
        $R62 = min($price_expensive, $cc_high, $seat_high, $tank_high, $torque_low, $power_high);
        $R63 = min($price_expensive, $cc_high, $seat_high, $tank_high, $torque_high, $power_low);
        $R64 = min($price_expensive, $cc_high, $seat_high, $tank_high, $torque_high, $power_high);

//        $Min1 = min($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$R14,$R15,$R16,$R17,$R18,$R19,$R20,$R21,$R22,$R23,$R24,$R25,$R26,$R27,$R28,$R29,$R30,$R31,$R32);
//        $Min2 = min($R33,$R34,$R35,$R36,$R37,$R38,$R39,$R40,$R41,$R42,$R43,$R44,$R45,$R46,$R47,$R48,$R49,$R50,$R51,$R52,$R53,$R54,$R55,$R56,$R57,$R58,$R59,$R60,$R61,$R62,$R63,$R64);
//        $Min = min($Min1, $Min2);

        //FIND MAX
        $Max1 = max($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$R14,$R15,$R16,$R17,$R18,$R19,$R20,$R21,$R22,$R23,$R24,$R25,$R26,$R27,$R28,$R29,$R30,$R31,$R32);
        $Max2 = max($R33,$R34,$R35,$R36,$R37,$R38,$R39,$R40,$R41,$R42,$R43,$R44,$R45,$R46,$R47,$R48,$R49,$R50,$R51,$R52,$R53,$R54,$R55,$R56,$R57,$R58,$R59,$R60,$R61,$R62,$R63,$R64);
        $Max = max($Max1, $Max2);

        //FIND a1 AND DEFUZZIFICATION
        if($Max1 > $Max2){
            //FIND a1
            $a1 = $maximum - ($Max1 * ($maximum - $minimum)); // a1 = domain
            //FIND DEFFUZIFICATION
            $MOM = ($minimum + $a1) / 2;
        }else if($Max1 < $Max2){
            //FIND a1
            $a1 = $minimum + ($Max2 * ($maximum - $minimum)); // a1 = domain
            //FIND DEFFUZIFICATION
            $MOM = ($a1 + $maximum) / 2;
        }else{
            //FIND a1
            $a1 = ($minimum + $maximum) / 2; // a1 = domain
            //FIND DEFFUZIFICATION
            $MOM = $a1;
        }
        array_push($data, $MOM);
        array_push($car_rows, $row);
//        array_push($carimage,$row);
    }
    $highest = 0;
    $indexcont = 0;
    $maxindex = 0;
    foreach ($data as $value){
        if($highest < $value){
            $highest = $value;
            $maxindex = $indexcont;
        }
        $indexcont+=1;
    }
    if($indexcont == 0){
        echo "<script type='text/javascript'>alert('Sorry, no requirement match!')</script>";
        echo "<script language='javascript' type='text/javascript'> location.href='index.html' </script>";
    }else{
        showCalculation($car_rows, $maxindex);
    }
}
?>