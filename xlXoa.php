<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xu ly Xoa sach</title>
</head>
<body>
<?php
$bookId = $_GET["bookId"];
// $bookIDDeleted = $_POST["BookIDDeleted"];
include_once("DataProvider.php");
DataProvider::ExecuteQuery("Delete From book Where BookID = " .
$bookId);
header("Location: TimSach.php");
?>
Đã xóa thành công cuốn sách có mã là <?php echo($bookId); ?>

<br>
<a href="TimSach.php" > Tiếp tục tìm kiếm </a>

</body>
</html>