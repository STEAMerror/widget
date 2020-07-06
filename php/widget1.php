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
    // require_once 'connect.php';
    // $query = "UPDATE `weatherparam` SET `id_city`=1" . ",`city_name`='" . $cityName . "', `temp_c`='" .
    // $temp_c . "', `humidity`='" . $humidity . "', `wind`='" . $wind . "', `pressure`='" . $pressure .
    // "', `icon_id`='" . $iconId . "' WHERE `id_city`=1";
    // // echo $query;
    // $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
?>

<?php
// Получаем данные о погоде из БД
// require_once 'connect.php'; 
// $result = mysqli_query ($con, "SELECT * from `weatherparam` WHERE `id_city`=1");



// while($name = mysqli_fetch_assoc($result)) {
    // $cityName = $name['city_name'];
    // $temp_c = $name['temp_c'];
    // $humidity = $name['humidity'];
    // $wind = $name['wind'];
    // $pressure = $name['pressure'];
    // $iconId = $name['icon_id'];
// }
// mysqli_close($con);
?>

<span class="nameCity">
    <?php 
    // Выводим название города, используя функцию перевода из транслита в кириллицу
    require_once 'trans_func.php';
    print transliterateen($cityName);
    ?>
</span>

<hr>

<div class="weatherAndTemp">   
    <span class="temp"> 
        <?php 
        // Вывод температуры
        if ($temp_c >= 0) {
            print '+';
            } else {
            print '-';
            }; 
        print $temp_c;
        ?>
        C&deg; 
    </span> 
    <?php  
    // Вывод иконки
    echo '<img class="imgWeather" src="https://openweathermap.org/img/wn/' . $iconId . '@2x.png">'; 
    ?>
</div>
<!-- Вывод параметров и, соответствующих им, изображений -->
<img class="icon" src="img/Humidity.png">  
<span class="param">
    <?php 
    print $humidity; 
    ?>% 
</span> 
<br>

<img class="icon" src="img/wind.png"> 
    <span class="param">
    <?php 
    print $wind; 
    ?> м/c 
    </span>
<br>
<img class="icon" src="img/pressure.png"> 
<span class="param"> 
    <?php 
    print round($pressure, 0);
    ?> мм рт. ст. 
</span>
