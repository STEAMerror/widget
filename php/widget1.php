<?php
// Получаем данные о погоде из БД
require_once 'connect.php'; 
$result = mysqli_query ($con, "SELECT * from `weatherparam` WHERE `id_city`=1");
while($name = mysqli_fetch_assoc($result)) {
    $cityName = $name['city_name'];
    $temp_c = $name['temp_c'];
    $humidity = $name['humidity'];
    $wind = $name['wind'];
    $pressure = $name['pressure'];
    $iconId = $name['icon_id'];
}
mysqli_close($con);
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
