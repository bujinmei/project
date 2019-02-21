<?php
	
	/*
	 	需求：
	 		* 接收前端传来的数据
	 		* 做数据库的查询
	 		* echo 数据给前端
	 
	 */
	
	header("content-type:text/html;charset=utf-8");
	
	//接收前端传来的数据
	$id=isset($_GET['id'])?$_GET['id']:'';//如果有就用它本身，没有就
//	echo $page,$qty;//接收参数记得检测，接收成功再往下面做
    // echo $id;
	//做数据库的查询
	
	include 'connect.php';
	
	//写查询语句:按需查询数据，每一次只查询一页数据
	$sql = "SELECT * FROM list where id='$id'";
	// echo $sql;
	//执行语句:得到的返回值是一个结果集
	$res = $conn->query($sql);

	$row = $res->fetch_all(MYSQLI_ASSOC);   //对象格式
	//获取结果集里面的内容部分
	// var_dump($row);

	echo json_encode($row,JSON_UNESCAPED_UNICODE);

?>