<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style  type="text/css">
.container {
	width: 70%;
	margin: auto;
	text-align: center;
}</style>
</head>

<body>
        	
       
   <div >
		<?php
         include("./Menu.php");
        ?>
	</div>
   	<div class="container">
    	
        <?php
            include_once('DataProvider.php');
			session_start();
              if (isset($_SESSION['name']))
            {
                echo "<h2  class='animated heartBeat bounce'>Chào mừng <span style='color:red;'><strong>" . 							     				$_SESSION["name"] . "</span></strong> đã đến với trang quản lý Sách của tôi.</h2>";
				
	
            }
            ?>
    </div>
</body>
</html>