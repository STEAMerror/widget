$(document).ready(function(){
   $.ajax({     //функция вызова файла, отвественного за добавление данных о городах в БД
        url:'php/widget_api.php',
		cache: false,
        success:function() {
            setTimeout(wid1, 0);    //функция вызова виджета первого города
            
            function wid1 (){   //функция отображения виджета первого города
                $.ajax({
                    url:'php/widget1.php',
                    cache: false,
                    success:function(data) {
                        $(".animationWidget").html('');
                        $(".animationWidget").html(data); 
                        setTimeout(wid2, 3700);     //функция вызова виджета второго города с задержкой 
                    }
                });
            }
            
            function wid2 (){   //функция отображения виджета второго города
                $.ajax({
                    url:'php/widget2.php',
                    cache: false,
                    success:function(data) {
                        $(".animationWidget").html('');
                        $(".animationWidget").html(data);
                        setTimeout(wid1, 3700);     //функция вызова виджета первого города с задержкой
                    }
                });
            }    
        }    
    });
});