<?php
// header('Http/1.1 404 Not Found');die;
header('content-type:text/html;charset=utf-8');
//连接本地数据库
$link=mysqli_connect("127.0.0.1","root","123","student");
if($link->connect_errno){
	die($link->connect_error);
}
//设置字符集
mysqli_set_charset($link,"utf8");
$name=$_POST['user'];

//SQL语句查询登录
 $sql = "select * from login where user = '".$name."'";
 //执行查询SQL
 $data = mysqli_query($link,$sql);
 //资源转化数组
 $info = mysqli_fetch_assoc($data);
 if(empty($info['user'])){
 	echo "<script>alert('用户名不存在');location='login.html';</script>";
 }else{
 	//判断密码是否正确
 	if($info['pwd']!=$_POST['pwd']){
        echo "<script>alert('密码不正确');location='login.html';</script>";
 	}else{
 		echo "<script>alert('密码正确');location='http://www.bb.com/jifen.php?name=$name';</script>";
 	}
 }
 
?>