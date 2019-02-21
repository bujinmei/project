<?php

//中文乱码
header("content-type:text/html;charset=utf-8");

$id = isset($_POST['id']) ? $_POST['id'] : '';
$font =isset($_POST['font']) ? $_POST['font'] : '';
$current =isset($_POST['current']) ? $_POST['current'] : '';
$old =isset($_POST['old']) ? $_POST['old'] : '';
$big =isset($_POST['big']) ? $_POST['big'] : '';

//  echo('$font');
/**
 * 1.接收前端传输过来的数据
 * 2.数据库查询判断是否含有同id
 * 3.如果有则修改新数据，如果没有就添加新数据
 * 
 */

include 'connect.php';

$sql="SELECT * FROM contents WHERE id ='$id'";

//执行语句:得到的返回值是一个结果集
$res = $conn->query($sql);

$nu = $res->num_rows; //获取结果集长度
	
//获取结果集里面的内容部分
$row = $res->fetch_all(MYSQLI_ASSOC);//对象格式  [{},{},{}]

if($nu){
    $conn->query("UPDATE contents SET  `id` = $id
    WHERE id = '$id'");
    $conn->query("UPDATE contents SET `font` = $font
    WHERE id = '$id'");
    $conn->query("UPDATE contents SET `current` = $current
    WHERE id = '$id'");
    $conn->query("UPDATE contents SET `old` = $old
    WHERE id = '$id'");
    $conn->query("UPDATE contents SET `big` = $big
    WHERE id = '$id'");
    $an="修改成功";
    }
    else {
        //插入数据到数据库 
        // $strsql = ;
        $conn->query("insert into contents (id,font,current,old,big)values ('$id', '$font', '$current','$old','$big')");
        $an="添加成功";
    }

  
    echo $id,$font,$current,$old,$big;
//6.新建关联数组
// $slic=array(
//     'arr' => $row,  //获取结果集
//     'nu' => $nu, //结果集长度
//     'an' => $an,
   
// );
// // //7.返回给前端
//  echo json_encode($slic,JSON_UNESCAPED_UNICODE);

// $res->close();
// $conn->close();


?>