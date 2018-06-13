<?php
	header("Content-type","text/html;charset=utf-8");
	//1、输入（接受前端的数据）
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];
	$useremail=$_POST['useremail'];
	//2、处理（连接数据库，保存数据）
	$resultStr="";
    //1)、连接数据库（搭桥）
    $conn=mysql_connect("localhost","root","root");
    if(!$conn){
    	$resultStr="connect fail";
    }else{
    	mysql_select_db("mydb1802",$conn);
    	$sqlstr="select * from usertable where username='".$username."'";
    	$result=mysql_query($sqlstr,$conn);

    	$rows=mysql_num_rows($result);
    	if($rows>0){
    		$resultStr="the username exists";
    	}else{
    		$sqlstr="insert into usertable values('".$username."','".$userpass."','".$useremail."')";
    		$str=mysql_query($sqlstr,$conn);
    		if($str==1){
				$resultStr="success";
			}else{
				$resultStr="reg fail";
			}
    	}
    	mysql_close($conn);
    }
    echo $resultStr;
?>