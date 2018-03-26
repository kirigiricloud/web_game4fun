

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GameList</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
	    <style>
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
}
.dropdown:hover .dropdown-content {
  display: block;
}
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>GameList</h2>
        <p>Game released so far.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <die class="form-group">
			<div class="dropdown">
  <button>sort by</button>
  <div class="dropdown-content">
    <p>release date</p>
    <p>category</p>
  </div>
</div> </br> </br>
			
			<?php
// Include config file


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game4fun";


session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT gameID,gName,since FROM game';
$result = mysqli_query($conn, $sql);

if (!$sql) {
    die ('SQL Error: ' . mysqli_error($conn));
}
 
echo '<table>
        <thead>
            <tr>
                <th>GName</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($result))
{
   	
    echo '<tr>
            <td>'.$row['gName'].'</td>
            <td>'.date_format(new DateTime($row['since']),'Y/m/d').'</td>
   </tr>';
}
echo '
    </tbody>
</table>';


mysqli_close($conn);
?>

            </div>			
          
            
        </form>

</div>
		
		
</body>
       
	   
</html>
 