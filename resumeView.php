<?php 
    $servername = "localhost";
	$username = "root";
	$password = "kanika";
	$dbname = "mywebsite";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql2 = "SELECT pid FROM personal_info ORDER BY pid DESC"; 
    $result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($result2);
	
	$sql = "SELECT data FROM resume WHERE pid ='{$row2["pid"]}' ";
	$result10 = mysqli_query($link, $sql);    // query execution
	$row = mysqli_fetch_object($result10); // returns the current row of the resultset
	$pdf_content = $row["data"]; // Put contents of pdf into variable
	$fileName = time().".pdf";

	header("Content-type: application/pdf");
	header("Content-disposition: attachment; filename=".$fileName);
	echo $pdf_content;
?>