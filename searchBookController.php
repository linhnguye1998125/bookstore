<?php
    include("DataProvider.php");


    if(isset($_POST["tenSach"])){
        $tenSach = $_POST["tenSach"];
        $sql = "SELECT * FROM book WHERE BookTitle like '%" . $tenSach . "%' ";
        $result =DataProvider::ExecuteQuery($sql);
        $books = array();
        while ($row = mysqli_fetch_array($result)){
          $books[] = array(
                  'BookId' => $row["BookID"],
                  'BookTitle' => $row['BookTitle'],
                  'Bookdesc' => $row['BookDesc'],
                  'BookCatID' => $row["BookCatID"],
                  'BookAuthor' => $row["BookAuthor"],
                  'BookPubID' => $row['BookPubID'],
                  'BookYear'  =>  $row['BookYear'],
                  'BookPic'  =>  $row['BookPic'],
                  'BookPrice'  => $row['BookPrice'],
                  'BookRate' => $row['BookRate']
          );
      }
      die (json_encode($books));
    }
?>