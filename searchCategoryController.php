<?php
include('DataProvider.php');
$db = new config();


$idCategory = $_POST['idCategory'];
if(isset($idCategory) && $idCategory !=""){

$sql = "SELECT * FROM book WHERE BookCatID='".$idCategory."'";

$result = DataProvider::ExecuteQuery($sql);

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
}else{
  $sql = "SELECT * FROM book";

$result = DataProvider::ExecuteQuery($sql);

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