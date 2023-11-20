<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật thể loại</title>
</head>
<body>
<?php
	//lấy thông tin cũ
	//lấy id list.php truyền qua trên đường dẫn
	$MaSua = $_GET["MaSua"];
	//mở kết nối
	require_once("connect.php");
	//lấy thông tin record có id là $id
	$sql = "SELECT * FROM sua WHERE MaSua = $MaSua";
	//$result là bảng chỉ chứa 1 hàng
	$result = mysqli_query($conn, $sql);
	//$row: chính là hàng chứa thông tin cần sửa
	$row = mysqli_fetch_assoc($result);
	//update thông tin mới
	if(isset($_POST["btnCapnhat"]))
	{
		$MaSua = $_POST["numMa"];
		$TenSua = $_POST["txtTen"];
		$HangSua = $_POST["sltBrand"];
		$LoaiSua = $_POST["txtLoai"];
		$TrongLuong = $_POST["txtLuong"];
		$Gia = $_POST["numGia"];
		//Mở kết nối CSDL
		require("connect.php");
		$sql = "update sua set  TenSua = '$TenSua', HangSua = '$HangSua',
		LoaiSua = '$LoaiSua', TrongLuong = '$TrongLuong', Gia = '$Gia' where MaSua = $MaSua";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			//đóng kết nối
			mysqli_close($conn);
			header("location:list.php");
		}
		else
		{
			echo "Update thất bại " . mysqli_error($conn);
		}
	}
?>
	<div class="container">
		<form method="post">
		<table>
				<tr>
					<td>Mã sữa: </td>
					<td><input type="number" name="numMa"></td>
				</tr>
				<tr>
					<td>Tên sữa: </td>
					<td><input type="text" name="txtTen"></td>
				</tr>
				<tr>
					<td>Hãng sữa: </td>
					<td>
						<select name="sltBrand">
							<option value="1">Vinamilk</option>
							<option value="2">Dutch Lady</option>
							<option value="3">Nutifood</option>
							<option value="4">Nestle</option>
							<option value="5">IDP</option>
							<option value="6">Nutricare</option>
							<option value="7">Mộc Châu</option>
							<option value="8">TH True Milk</option>
							<option value="9">Abbott</option>
							<option value="10">VPMilk</option>
							<option value="11">Fami</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Loại sữa: </td>
					<td><input type="text" name="txtLoai"></td>
				</tr>
				<tr>
					<td>Trọng lượng: </td>
					<td><input type="text" name="txtLuong"></td>
				</tr>
				<tr>
					<td>Giá sữa: </td>
					<td><input type="number" name="numGia"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Thêm" name="btnCapnhat"></td>
					<td><input type="reset" value="Hủy"></td>
				</tr>
			</table>
		</form>
	</div>		
</body>
</html>