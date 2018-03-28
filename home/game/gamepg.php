<?php
session_start();

?>

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
  
      body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
	table {
     width: 100%;
}

td, th {
   text-align: center;
}
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
  
  
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
          <p><input type="button" value="release date" onclick="location='gamepg.php'" /></p>
          <p><input type="button" value="category" onclick="location='sort.php'" /></p>
        </div>
      </div> </br> </br>

      <?php

      include("../../mysqli_connect.php");

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

    
     echo "<tr> 
	 <td>  
     
	 <a href='gameP.php?gid=".$row['gameID']."'> "
	 
	
	 .$row['gName']." </a> </td>
     <td> ".$row['since']."
	 </td>
	  </tr>";
	  }
	  echo "
	  </tbody>
      </table>";



      mysqli_close($conn);
      ?>

    </div>			

	

  </form>

</div>


</body>


</html>

