<?php
        // city 1 api
        $key = '3f8429473cc28d4460ea04104cd1ff2b'; 
        $responce = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=Oryol,ru&APPID='.$key);
        $responce = json_decode($responce, true);
        $weatherArr = $responce['weather'];
        $cityName = $responce['name'];
        $temp_k = $responce['main']['temp'];
        $temp_c = round($temp_k - 273.15);
        $humidity = $responce['main']['humidity'];
        $wind = $responce['wind']['speed'];
        $pressure = $responce['main']['pressure'];
        $iconId =  $weatherArr [0]['icon'];
        $pressure = $pressure * 0.75006375541921;
        require_once 'connect.php';
        $query = "UPDATE `weatherparam` SET `id_city`=1" . ",`city_name`='" . $cityName . "', `temp_c`='" .
        $temp_c . "', `humidity`='" . $humidity . "', `wind`='" . $wind . "', `pressure`='" . $pressure .
        "', `icon_id`='" . $iconId . "' WHERE `id_city`=1";
        // echo $query;
        $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
    ?>

    <?php
        // city 2 api
        $key1 = '3f8429473cc28d4460ea04104cd1ff2b'; 
        $responce1 = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=Vladimir,ru&APPID='.$key);
        $responce1 = json_decode($responce1, true);
        $weatherArr1 = $responce1['weather'];
        $cityName1 = $responce1['name'];
        $temp_k1 = $responce1['main']['temp'];
        $temp_c1 = round($temp_k1 - 273.15);
        $humidity1 = $responce1['main']['humidity'];
        $wind1 = $responce1['wind']['speed'];
        $pressure1 = $responce1['main']['pressure'];
        $iconId1 =  $weatherArr1 [0]['icon'];
        $pressure1 = $pressure1 * 0.75006375541921;
        $query1 = "UPDATE `weatherparam` SET `id_city`=2" . ",`city_name`='" . $cityName1 . "', `temp_c`='" .
        $temp_c1 . "', `humidity`='" . $humidity1 . "', `wind`='" . $wind1 . "', `pressure`='" . $pressure1 .
        "', `icon_id`='" . $iconId1 . "' WHERE `id_city`=2";
        // echo $query1;
        $result = mysqli_query($con, $query1) or die("Ошибка " . mysqli_error($con));
        mysqli_close($con);
    ?>