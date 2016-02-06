
<?php
include ("header.php");
?>  
    
 
 <div id="centerDoc">
 
        <h1> The main operations </h1>                      
           <br/>
        
        <?php 
			/* if(cookiesDisabled()){
				echo "<p>Site navigation is forbidden with cookies disabled.</p>";
				die();
			}*/
        $updateUserURL="add.php";
        $removeUserURL="delete.php";
		?>
  
    <?php 
    echo "<table>";
    echo "<tr><th>Name</th><th>LastName</th><th>Age</th><th>Email</th><th>Telephone</th>";
    
    $conn = mysqli_connect(NULL, 'root', '', 'addr_book');		
		if (!$conn)
	       die('Connection failed (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        if (!mysqli_set_charset($conn, "utf8"))
	       die('Error loading character set utf8: ' . mysqli_error($conn));
		
		$ris = mysqli_query($conn, "SELECT * FROM `user_list`");
      if (!$ris)
        die('Query failed');
      
      if (mysqli_num_rows($ris) == 0)
      	return true;
      
		else if( $ris->num_rows > 0){
			
			
			
			
			
			while($row = $ris->fetch_assoc()){      
				echo "<tr><td style='width:100px'>" . $row['Name'] . "</td>"
					
      			    ."<td>".$row['LastName']."</td>"
      		        ."<td>" . $row['Age'] . "</td>"
					."<td>" . $row['Email'] . "</td>"
					."<td>" . $row['Telephone'] . "</td>"
					
					."<td style='border: 0px; width:85px'><a href='" . $updateUserURL . "?UID=" . $row['UID'] . "'>"
							."<button value='update'>Update</button></a></td>"
					."<td style='border: 0px; width: 82px'><a href='" . $removeUserURL . "?UID=" . $row['UID'] . "'>"
					."<button value='delete'>Delete</button></a></td>"
					;
			}
			echo "</table>";
			
		} else {	
			echo "<p>There are currently no users in the database.</p>";
		}
		
		$conn->close();
		?>
    <br>
    <br>
    <button class="btn" name="addUser" onclick="location.href='add.php'">Add User</button>
  
 </div>

<?php include ("footer.php"); ?>    
      
