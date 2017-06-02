<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    </head>
<body>
    <br>
<hr> 
<br><br> 
<?php 
    
#если что-то не заполнили   
if (empty($_POST['loginNew']))  exit ("Вы не указали Логин!<br><br><form action='test.html' method=POST><input type='submit' name=out value='Выход'></form>"); 
if (empty($_POST['passNew'])) exit ("Вы не придумали пароль!<br><br><form action='test.html' method=POST><input type='submit' name=out value='Выход'></form>");
if (empty($_POST['ageNew'])) exit ("Вы не указали возраст!<br><br><form action='test.html' method=POST><input type='submit' name=out value='Выход'></form>");
#если что-то не заполнили 
           
$lg = $_POST['loginNew']; #данные с поля логин
$pa = $_POST['passNew']; #данные с поля пароль
$age = $_POST['ageNew']; #данные с поля Возраст
$db_name = 'thoth.txt'; # куда будем сохранять 
    
#Начало проверки логина на уникальность     
$f=file($db_name); #открываем файл в котором будем проверять
foreach ($f as $kk=>$vv) #цикл который позволяет пробежаться по значениям массива, as - для перебора  kk - индексы vv - значения
{
$aa=explode(';',$vv); #разбиваем эту строку по разделителям ( ; ) (';',$vv)
 if ($aa[0] == $lg){ #проверка логина на соттветствие данных в файле
echo "Login уже существует...<br><br><form action='test.html' method=POST> 
<input type='submit' name=out value='Выход'>
</form>"; #сообщение о ошибке
     exit (-1); # -1 прервать исполнение скрипта php грубое прирывание число не влияяет
   }
    }  
#КОНЕЦ проверкипроверка логина на уникальность  
    
#Начало сохраний данные о новом пользователе в файл 
$ff = fopen($db_name,'a+'); # функция открытия файла 
$str = $lg.";".$pa.";".$age."."."\n"; # функция внесения данных. 
fwrite ($ff,$str); # сохранияем 
fclose ($ff); # закрывает файл после занесения информации в него  
//$f = file($db_name); #присвоили функции открытия переменную f
#КОНЕЦ сохранений данных о новом пользователе в файл       

#когда ввел данные выдает стекст
echo 'Теперь ты с нами!<br><br>
При регистрации указаны следующие данные:<p>
Ваш Login: '.$lg.'<br>'.'Пароль: '.$pa.'<br>'.'Возраст: '.$age.'<br>'; #акция (проверка на возраст)
#когда ввел данные выдает стекст
?>
<br>     
<form action='test.html' method=POST>
<input type='submit' name=out value='Выход'>
</form>
    </body>
</html>