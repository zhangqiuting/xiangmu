<?php
	header("Content-type","text/html;charset=utf-8");
	//1、输入（接收前端数据）
	$username=$_GET['username'];
	//2、处理（连接数据库，保存数据）
	$resultStr="";
	//1)、连接数据库（搭桥）
	$conn=mysql_connect("localhost","root","root");
	if(!$conn){
		$resultStr="connect fail";
	}else{
		//2)、选择数据库（目标）
		mysql_select_db("mydb1802",$conn);
		//3)、执行SQL语句（添加语句）（运输）
	    //3.1)、查询该用户名是否被注册
	    $sqlstr="select * from usertable where username='".$username."'";
	    $result = mysql_query($sqlstr,$conn);
	    //查询语句的返回值是表格
	    $rows=mysql_num_rows($result);
	    if($rows>0){
	    	$resultStr="0";
	    }else{
	    	$resultStr="1";
	    }
	    //4)、关闭数据库（拆桥）
	    mysql_close($conn);
	}
	header("Location:../index.html"); 
?>