<?php
include('DataProvider.php');

$idPublisher = $_POST['idPublisher'];
if(isset($idPublisher) && $idPublisher !=""){

$sql = "SELECT * FROM book WHERE BookPubID='".$idPublisher."'";

$result = DataProvider::ExecuteQuery($sql);

$booksByPublisher = array();

while ($row = mysqli_fetch_array($result)){
    $booksByPublisher[] = array(
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
die (json_encode($booksByPublisher));
}else{
  $sql = "SELECT * FROM book";

$result = DataProvider::ExecuteQuery($sql);

$booksByPublisher = array();

while ($row = mysqli_fetch_array($result)){
    $booksByPublisher[] = array(
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
die (json_encode($booksByPublisher));
}
?>