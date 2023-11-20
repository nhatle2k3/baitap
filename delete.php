<?php
	//lấy id bên list.php truyền qua bằng biến id
	$MaSua = $_GET["MaSua"];
	require_once("connect.php");
	$sql = "DELETE FROM sua WHERE MaSua = $MaSua";
	// $result = mysqli_query($conn, $sql);
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		mysqli_close($conn);
		header("location:list.php");
	}
	else
		echo "Xóa thất bại " . mysqli_error($conn);
?>