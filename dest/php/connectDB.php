<?php
    $dbname='dd105';
    $dsn= "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $user= "root";
<<<<<<< HEAD
    $password= "942jongkey";
=======
    $password= "root";
>>>>>>> a6f9f42206068f657c0578d499cc98765bab3175
    $options= array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo= new PDO($dsn, $user, $password, $options);
?> 