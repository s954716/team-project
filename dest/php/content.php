<?php
try {
    require_once("./connectDB.php");

    $sql = "select * from `manager`;";
    $manager = $pdo->prepare($sql);
    $manager->execute();

    $managerRow = $manager->fetchAll(PDO::FETCH_ASSOC);//得到二維陣列的每一列
    session_start();
    foreach ($managerRow as $rows) {//得到每一列裡面的值(印出來是array)
        foreach ($rows as $key => $value) {//再將每一array裡的索引、索引值印出
            // $data = [$value];//array
            // $msg = json_encode($data); //string
            $data = $value."," ;
            // $msg = json_encode($data);
            echo $data ;
        } 
    }
  
} catch (PDOException $e) {
    echo "錯誤行號 : " . $e->getLine() . "<br>";
    echo "錯誤訊息 : " . $e->getMessage() . "<br>";
}
