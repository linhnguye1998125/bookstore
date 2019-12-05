<?php
  include_once("DataProvider.php");
?>

  <?php
      $dsNhaXuatBan = DataProvider::ExecuteQuery("SELECT * FROM publisher");
      if($dsNhaXuatBan != false){
          if(mysqli_num_rows($dsNhaXuatBan)>0){
            ?>
               <select id="publisher" class="p-2 mt-3">
                 <option selected value="">Chọn nhà xuất bản</option>
            <?php
             while($row = mysqli_fetch_array($dsNhaXuatBan)){
              $publisherID = intval($row["PublisherID"]);
              $publisherName = $row['PublisherName'];
               ?>
                  <option name="<?php echo $publisherName?>" value="<?php echo($publisherID)?>"><?php echo($publisherName) ?></option>
               <?php
             }
             ?>
            </select>
             <?php
          }
      }
  ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#publisher').on('change', function() {
      let valuePublisher = $("#publisher").val();
      $(".body-table").find("tr").remove();
      $.ajax({
          url:"searchPublisherController.php",
          method: "post",
          data: 'idPublisher='+ valuePublisher
      }).done(function(booksByPublisher){ 
          let listBooks = JSON.parse(booksByPublisher);
          listBooks.forEach((book)=>{
            $('.body-table').append("<tr>"
            +"<td>"+book.BookId+"</td>"
            +"<td>"+book.BookTitle+"</td>"
            +"<td>"+book.Bookdesc+"</td>"
            +"<td>"+book.BookCatID+"</td>"
            +"<td>"+book.BookAuthor+"</td>"
            +"<td>"+book.BookPubID+"</td>"
            +"<td>"+book.BookYear+"</td>"
            +"<td><img style='width:50px; height:50px;' src='"+book.BookPic+"' alt='Lỗi hình' /></td>"
            +"<td>"+book.BookPrice+"</td>"
            +"<td>"+book.BookRate+"</td>"
            +"<td><a class='btn btn-primary btn-small' href='deleteBookController.php?bookId="+book.BookId+"'>Xóa</a>"
            +"</td>"
            +"</tr>");
          })
      });
    });
  });
</script>