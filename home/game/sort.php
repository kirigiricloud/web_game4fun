<?php
session_start();
if(isset($_POST['sortT'])) {$_SESSION['sortT']=$_POST['sortT'];}
if(isset($_POST['submit'])) {$_SESSION['submit']=$_POST['submit'];}
if(isset($_POST['check_list'])) {$_SESSION['check_list']=$_POST['check_list'];}


$attribute = "gName";

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
  
    <h2>GameList</h2>
    <p>Game released so far.</p>
         <form action="sort.php" method="post">
         <input type="submit" value="ACTION"  name="sortT"   />
		 <input type="submit" value="FREE"    name="sortT"   />
	     <input type="submit" value="RACING"  name="sortT"   />
	     <input type="submit" value="RPG"     name="sortT"   />
	     <input type="submit" value="SPORTS"  name="sortT"   />
	     <input type="submit" value="OTHER"   name="sortT"   />
		 <br>
		 <br>
		 
		 Things that you want to display   GameName must be shown<br>
		 
		 <input name="check_list[]" type="checkbox" value="gName" onclick="return false;" checked = 'checked'/><label>GameName</label><br>
		 <input name="check_list[]" type="checkbox" value="gameID" checked='' /><label>GameID</label><br>
		 <input name="check_list[]" type="checkbox" value="since"  checked='' /><label>Release Date</label><br>
		 <input name="check_list[]" type="checkbox" value="gameInfo"checked='' /><label>Game Info</label><br>
		 <input name="check_list[]" type="checkbox" value="Company" checked='' /><label>Company</label><br>
         <input type="submit" name="submit" value="Show"/>
        
       </br> </br>

	   
	  <?php
     if(isset($_POST['submit'])){//to run PHP script on submit
     if(!empty($_POST['check_list'])){
     // Loop to store and display values of individual checked checkbox.
     foreach($_POST['check_list'] as $selected){
        $attribute .= $selected."</br>";
     }
       }   
         }
           ?> 
	   
	   
	   
      <?php

       if(isset($_SESSION['sortT'])){
			       
      include("../../mysqli_connect.php");

      $sql = 'SELECT G.gameID,gName,since,gameInfo,userID FROM game G,belong B WHERE G.gameID=B.gameID AND B.cname = "'.$_SESSION['sortT'].'"';
      $result = mysqli_query($conn, $sql);

      if (!$sql) {
        die ('SQL Error: ' . mysqli_error($conn));
      }

      echo '<table>
      <thead>
      <tr>      
	  <th>GName</th>';
     

      if(isset($_SESSION['check_list'])){	 
	  foreach($_SESSION['check_list'] as $selected){
		
       	if($selected=="gName"){echo "";}else{
		echo trim('<th>'.$selected.'</th>','"') ;}
	  }
	  
	  }
     
   	 echo
	  '</tr>
      </thead>
      <tbody>';

	        
     
      while ($row = mysqli_fetch_array($result))
      {
		  
     echo "<tr> 
	 <td>       
	 <a href='gameP.php?gid=".$row['gameID']."'> "	
	 .$row['gName']." </a> 	 
	 </td>  ";
	 
	 if(isset($_SESSION['check_list'])){
	  foreach($_SESSION['check_list'] as $selected){
		
		if($selected=="Company"){
			
	  $sql1 = 'SELECT B.userName FROM businessuser B,game G WHERE G.userID=B.userID AND G.userID = "'.$row['userID'].'"';
      $result1 = mysqli_query($conn, $sql1);

      if (!$result1) {
        die ('SQL Error: ' . mysqli_error($conn));
      }
	  
	  while($row1 = mysqli_fetch_array($result1))
	  {
		  
		  $Company = $row1['userName'];
		  
	  }
		
        echo trim('<td>'.$Company.'</td>')  ;	
			
		}else if($selected=="gName"){
			
			echo "";
			
		}else{
     		
		echo trim('<td>'.$row["$selected"].'</td>')  ;
		
		
		}
	 }
	 
	 }

	  echo"
	  </tr>";
	  }
	  echo "
	  </tbody>
      </table>";



	   mysqli_close($conn);}
      ?>

    		

	

  </form>

</div>


</body>
</html>