<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Them mot cuon sach</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">

</style>
</head>
<div >
		<?php
         include("./Menu.php");
        ?>
	</div>
<body style="text-align:center" >
 
    <div class="">
<h1><font color="blue"> Thêm một cuốn sách mới </font> </h1>
<?php
		 if(isset($_POST["btnThemMoi"])){
		 include_once("DataProvider.php");
		$booktitle = $_POST['txtTenSach'];
		$bookdesc = $_POST['txtNoiDungTomTat'];
		$bookcategory = $_POST['cmbTheLoai'];
		$bookauthor = $_POST['txtTacGia'];
		$bookpubid  = $_POST['cmbNhaXuatBan'];
		$bookyear = $_POST['txtNamXuatBan'];
		$bookprice = $_POST['txtGiaTien'];
		$bookrate  = $_POST['bookrate'];


		$file_name = $_FILES['file']['name'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
		$bookpic = "../img/".$file_name; 	
		move_uploaded_file($file_tem_loc, $bookpic);


		$sql = "INSERT INTO book(BookTitle, BookDesc, BookCatID,BookAuthor, BookPubID, BookYear, BookPic, BookPrice, BookRate) VALUES('" . $booktitle . "','" . $bookdesc . "','" . $bookcategory . "','" . $bookauthor . "','" . $bookpubid . "','" . $bookyear . "','".$bookpic."','" . $bookprice . "','" . $bookrate . "')";

		$ketqua=DataProvider::ExecuteQuery($sql);
			 if($ketqua== false){
				 echo '<script>alert("Thêm thất bại");</script>';
			 }
			 else{
				 echo '<script>alert("Thêm thành công");</script>';
			 }
	}
	?>
<div class="rows">
  <div>
    <form  style="padding-left: 26%;" method="post" enctype="multipart/form-data" name="form1" action="ThemSach.php">
      <fieldset style="width:600px;">
      <legend>Thông tin sách</legend>
      <table width="100%" border="0">
        <tr>
          <td width="50%">Tựa sách</td>
          <td width="50%"><input type="text" name="txtTenSach"/></td>
        </tr>
        <tr>
          <td>Hình bìa</td>
          <td width="423"><input type="file"  name="file" /></td>
        </tr>
        <tr>
          <td>Nội dung tóm tắt</td>
          <td><input type="text" name="txtNoiDungTomTat"/></td>
        </tr>
        <tr>
          <td>bookrate</td>
          <td><input type="text" name="bookrate"/></td>
        </tr>
        <tr>
          <td>Thể loại</td>
          <td><select name="cmbTheLoai" id="cmbTheLoai">
              <?php
								include_once("DataProvider.php");
								$dsTheLoai = DataProvider::ExecuteQuery("SELECT * FROM  category");
								if ( $dsTheLoai != false )
									{
									while($row = mysqli_fetch_array($dsTheLoai))
									{
										$maTheLoai = intval ($row["CategoryID"]);
										$tenTheLoai = $row["CategoryName"];
										?>
              <option value="<?php echo($maTheLoai); ?>"> <?php echo($tenTheLoai); ?> </option>
              <?php
									}
								}
								?>
            </select></td>
        </tr>
        <tr>
          <td>Danh sách tên tác giả</td>
          <td><input type="text" name="txtTacGia"/></td>
        </tr>
        <tr>
          <td>Nhà xuất bản </td>
          <td><select name="cmbNhaXuatBan" id="cmbNhaXuatBan" >
              <?php
									include_once("DataProvider.php");
									//$db = new DataProvider();
									$dsNhaXuatBan = DataProvider::ExecuteQuery("SELECT * FROM publisher");
									if($dsNhaXuatBan != false)
									{
										while($row = mysqli_fetch_array($dsNhaXuatBan))
										{
											$maNhaXuatBan = $row["PublisherID"];
											$tenNhaXuatBan = $row["PublisherName"];
										?>
              <option value="<?php echo($maNhaXuatBan); ?>"> <?php echo($tenNhaXuatBan); ?> </option>
              <?php	
										}
									}
									?>
            </select></td>
        </tr>
        <tr>
          <td>Năm xuất bản</td>
          <td><input type="text" name="txtNamXuatBan"/></td>
        </tr>
        <tr>
          <td>Giá tiền</td>
          <td><input type="text" name="txtGiaTien"/></td>
        </tr>
        <tr>
          <td align="right"><input type="submit" name="btnThemMoi" value="Thêm mới"/></td>
          <td><input name="btnLamLai" type="reset" value="Làm lại"/></td>
        </tr>
      </table>
    </form>
  </div>
  <div class="p-5">
    <table class="table table-center table-dard mt-9 ">
      <thead class="thead-dark">
        <tr>
          <th scope="col">BookId</th>
          <th scope="col">BookTitle</th>
          <th scope="col">BookDesc</th>
          <th scope="col">BookCatID</th>
          <th scope="col">BookAuthor</th>
          <th scope="col">BookPubID</th>
          <th scope="col">BookYear</th>
          <th scope="col">BookPic</th>
          <th scope="col">BookPrice</th>
          <th scope="col">BookRate</th>
        </tr>
      </thead>
      <tbody>
        <?php
                      $dsBook = DataProvider::ExecuteQuery("SELECT * FROM book");
                      if($dsBook != false)
                      {
                          while ($row = mysqli_fetch_array($dsBook)){
                            $bookId = intval($row["BookID"]);
                            $bookTitle = $row['BookTitle'];
                            $bookdesc = $row['BookDesc'];
                            $bookCatID = $row["BookCatID"];
                            $bookAuthor = $row["BookAuthor"];
                            $bookPubID = $row['BookPubID'];
                            $bookYear  =  $row['BookYear'];
                            $bookPic  =  $row['BookPic'];
                            $bookPrice  = $row['BookPrice'];
                            $bookRate = $row['BookRate'];
                            ?>
        <tr>
          <td><?php echo($bookId);?></td>
          <td><?php echo($bookTitle);?></td>
          <td><?php echo($bookdesc);?></td>
          <td><?php echo($bookCatID);?></td>
          <td><?php echo($bookAuthor);?></td>
          <td><?php echo($bookPubID);?></td>
          <td><?php echo($bookYear);?></td>
          <td><img style="width:50px; height:50px;" src="<?php echo($bookPic);?>" alt="Lỗi hình"/></td>
          <td><?php echo($bookPrice);?></td>
          <td><?php echo($bookRate);?></td>
        </tr>
        <?php
                          }
                      }
                    ?>
      </tbody>
    </table>
  </div>
</div></div>
</body>
</html>