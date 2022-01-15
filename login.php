<?php
$login = filter_var(trim ($_POST['login']),
FILTER_SANITIZE_STRING);
$email = filter_var(trim ($_POST['email']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim ($_POST['password']),
FILTER_SANITIZE_STRING);

//условия заполнения полей
if (mb_strlen($login) <5 || mb_strlen($login) > 60){
    echo "Недопустимая длина"
    exit();
} else if (mb_strlen($email) <8 || mb_strlen($email) > 80){
    echo "Недопустимая длина"
    exit();
} else if (mb_strlen($password) <8 || mb_strlen($password) > 40){
    echo "Недопустимая длина"
    exit();
} 
$password = md5($password."dfgh1234") //хеширование пароля 

$mysql = new newsql('localhost','root','root','dbkurswork') //обращение к бд
$mysql->query("INSERT INTO `users` (`login`,`email`,`password`) VALUES('$login','$email','$password')");

$mysql->close();

header('Location:index.html');

?>