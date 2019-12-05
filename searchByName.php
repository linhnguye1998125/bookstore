<input style="height:35px;" type="text" name="tensach" id="search" />
<input id="search-book" type="submit" class="btn btn-primary btn-small" name="btnTim" value="Tìm sách"/>
<input id="reset" type="submit" class="btn btn-primary btn-small" name="btnTimLai" value="Tìm lại"/>


<script type="text/javascript">
  $(document).ready(function(){
    $('#search-book').on("click", function(){
        let tenSach = document.getElementById("search").value;
        $(".body-table").find("tr").remove();
        $.ajax({
            url:"searchBookController.php",
            data:{ tenSach },
            type:"post",
            success:function(books){
              let listBooks = JSON.parse(books);
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
              });
            }
        })
    }),
    $("#reset").on("click",function(){
        return location.reload();
    })
  })
</script>
