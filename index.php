<?php
  $host='db';
  $user= 'ram';
  $password= 'ram';
  $db= 'mydb';

  $conn=new mysqli($host, $user,$password, $db);
  if($conn ->connect_error){
	echo 'connection failed'.$conn->connect_error;
	}
  echo 'successufully connected to mysqli';
?>
