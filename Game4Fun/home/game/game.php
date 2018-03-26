
<?php
include("../../mysqli_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GameList</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>
    <div class="wrapper">	
       
        <h1>Game</h1>
        // show game stuffs 
        
        
        <h2>Reviews</h2>
        <?php
        $sql = "SELECT * FROM review,game WHERE gameID=rID";
        $result = mysqli_query($conn,$sql);

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

//0 should be the current post's id
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="comment">
                By: <?php echo $row->author; //Or similar in your table ?>
                <p>
                    <?php echo $row->body; ?>
                </p>
            </div>
            <?php
        }
        ?>




        <h4>Leave a comment:</h4>
        <form action="insertcomment.php" method="post">
            <!-- Here the shit they must fill out -->
            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

            <input type="hidden" name="postid" value="<?php //your posts id ?>" />
            <input type="submit" />
        </form>






        <h2>Leave a Review:</h4>
            <form action="insertcomment.php" method="post">
                <!-- Here the shit they must fill out -->
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

                <input type="hidden" name="postid" value="<?php //your posts id ?>" />
                <input type="submit" />
            </form>

        </body>
        
        
        </html>

