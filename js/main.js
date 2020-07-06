$(document).ready(function(){
    wid1();    //функция вызова виджета первого города
    wid2();
    function wid1 (){   //функция отображения виджета первого города
        $.ajax({
            url:'php/widget1.php',
            cache: false,
            success:function(data) {
                $(".animationWidget1").html(data); 
            }
        });
    }      
    function wid2 (){   //функция отображения виджета второго города
        $.ajax({
            url:'php/widget2.php',
            cache: false,
            success:function(data) {
                $(".animationWidget2").html(data);
            }
        });
    }
    repeater1();
    function repeater1(){
        document.getElementsByClassName('animationWidget1')[0].style.display = 'none';
        document.getElementsByClassName('animationWidget2')[0].style.display = 'block';
        setTimeout(repeater2, 4000);
    }
    function repeater2(){
        document.getElementsByClassName('animationWidget2')[0].style.display = 'none';
        document.getElementsByClassName('animationWidget1')[0].style.display = 'block';
        setTimeout(repeater1, 4000);
    }
});