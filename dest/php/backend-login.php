<?php 
try {
	
	require_once("./connectDB.php");
	
	$sql = "select * from `manager` where managerAccount=:managerAccount and managerPsw=:managerPsw;";
$manager = $pdo->prepare($sql);
$manager->bindValue(":managerAccount", $_POST["managerAccount"]);
$manager->bindValue(":managerPsw", $_POST["managerPsw"]);
$manager->execute();

} catch (PDOException $e) {
	echo "錯誤行號 : " . $e->getLine() . "<br>";
	echo "錯誤訊息 : " . $e->getMessage() . "<br>";
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>後台登入</title>
</head>
<body>
    
<?php 
if($manager->rowCount()==0){
	echo "帳密錯誤, <a href='../backend-login.html'>請重新登入</a>";
}else{
	$managerRow =$manager->fetch(PDO::FETCH_ASSOC);
	
	header("Location: ../adminManage.html");
}

?>
</body>
</html>