<?php
  include_once("DataProvider.php");
 
?>

  <?php
      $dsTheLoai = DataProvider::ExecuteQuery("SELECT * FROM category");
      if($dsTheLoai != false){
          if(mysqli_num_rows($dsTheLoai)>0){
            ?>
               <select id="category" class="p-2 mt-3">
                 <option selected value="">Chọn thể loại</option>
            <?php
             while($row = mysqli_fetch_array($dsTheLoai)){
              $categoryId = intval($row["CategoryID"]);
              $categoryName = $row['CategoryName'];
               ?>
                  <option name="<?php echo $categoryName?>" value="<?php echo($categoryId)?>"><?php echo($categoryName) ?></option>
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
    $('#category').on('change', function() {
      let valueCategory = $(this).val();
      var ptr = $(".body-table").find("tr").remove();
      $.ajax({
          url:"searchCategoryController.php",
          method: "post",
          data: 'idCategory='+ valueCategory
      }).done(function(books){ 
          let listBooks = JSON.parse(books);
          console.log(listBooks);         
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
            +"<td><a>Xóa</a>"
            +"</td>"
            +"</tr>");
          })
      });
    });
  });
</script>