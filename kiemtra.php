<?php
include( "DataProvider.php" );
$username = $_POST["username"];
$password = $_POST["password"];

			$dsNguoiDung = DataProvider::ExecuteQuery( "Select * From dangky" );
			if ( $dsNguoiDung != false ) {
				while ( $row = mysqli_fetch_array( $dsNguoiDung ) ) {
					if ( $username == $row[ "user" ] &&
						$password == $row[ "pass" ] ) {
							echo 1;
							exit();
					}
					echo 0; exit();
				}
			}
       
?>
