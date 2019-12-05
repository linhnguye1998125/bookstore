

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quan Ly Sach</title>
  
  <?php
  	include "headerScript.php"
  ?>
</head>

<body>
<div >
		 <?php
         include("./Menu.php");
        ?> 
	</div>
  
  <div class="ccontainer">  
    <div class="row">
   
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="QLSach w-100 p-2 h-100">
              <h1>Quản lý sách</h1>
              <div class="body-qlsach w-100">
                 
                  <div class="=mt-2 mb-2 ml-3" id="ThemSach">
                    
                  </div>
                  <div class="mt-5 text-center">
                    <?php

                       include('searchByName.php');
                       include('searchByCategory.php');
                       include('searchByPublisher.php');

                    ?>
                  </div>
              </div>
              <div class="p-4">
              <table id="myTable" class="table table-center table-dard mt-9">
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
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody class="body-table">
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
                                <td>
                                  <a class="btn btn-primary btn-small" href="xlXoa.php?bookId=<?php echo $bookId; ?>">Xóa</a>
                                </td>
                              </tr>
                              <?php
                          }
                      }
                    ?>
       
                  </tbody>
                </table>
                </div>
          </div>
      </div>
    </div>
  </div>
  
</body>
</html>