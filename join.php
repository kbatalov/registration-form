<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    </head>
<body>
<hr>
<?php 
  
#если что то не заполнили   
if (empty($_POST['loginOld'])) exit ("Вы не указали Логин!<br><br><form action='test.html' method=POST><input type='submit' name=out value='Выход'></form>"); 
if (empty($_POST['passwordOld'])) exit ("Вы не ввели пароль!<br><br><form action='test.html' method=POST><input type='submit' name=out value='Выход'></form>");
#если что то не заполнили     
    
$lg = $_POST['loginOld']; # данные с поля логин
$pa = $_POST['passwordOld']; # данные с поля пароль
$db_name = 'thoth.txt';    #файл сохранения данных
#Начало провекрки авторизации 
$f=file($db_name); #присвоили функции открытия 
foreach ($f as $kk=>$vv) #цикл который позволяет пробежаться по значениям массива, as - для перебора  kk - индексы vv - значения
{
$aa=explode(';',$vv); # Разбиваем эту строку по разделителям ( ; ) (';',$vv)
 if ($aa[0] == $lg){ #проверка логина на соттветствие данных в файле
     if ($aa[1] != $pa) { #проверка пароля на соттветствие данных в файле
         echo "неверный пароль...<br><br><form action='test.html' method=POST> 
<input type='submit' name=out value='Выход'>
</form>"; #сообщение о ошибке
     exit (-1); # -1 прервать исполнение скрипта php грубое прирывание число не влияяет
 } 
#ЕСЛИ успешно прошли    
echo '<p>Ваш Login: '.$lg.'.<br>'.'Придуманый пароль: '.$pa.'.<br>'.'Возраст: '.$aa[2].'<br>'; 
break; #прервали цикл и переходим на следующую строку.
 }
  } 
#КОНЕЦ провекрки авторизации    
    
#Начало проверки на возраст
if ($age < 17) {
    echo '<p>Вам меньше 18!';
} if ($age > 50) {
    echo '<p>Вам больше 18!';
}
#КОНЕЦ проверки на возраст   
 ?>  
<form action='test.html' method=POST> 
<input type='submit' name=out value='Выход'>
</form>    
    </body>
</html>