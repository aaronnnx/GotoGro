<?php
  include "db_conn.php";

  if (empty($_SESSION))
	{
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>Gotogro Add Member</title>

      <style>
        body
        {
            background-color: #F1E9E8;
            font-family:Montserrat;
            font-size:14px;
        }

        ul.horizontal
        {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #4A4848;
        }

        ul.horizontal li
        {
          display: inline-block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        table
        {
      		border-collapse: collapse;
      		width:80%;
          margin-left: auto;
          margin-right: auto;
    	  }

    	  th,td
        {
    	  	border: 1px solid #c0c0c0;
      		padding: 10px;
  		    text-align:center;
  	    }

        a:link
        {
          color: white;
          background-color: transparent;
          text-decoration: none;
        }

        a:visited
        {
          color: white;
          background-color: transparent;
          text-decoration: none;
        }

        a:hover
        {
          color: green;
          background-color: transparent;
          text-decoration: none;
        }

        a:active
        {
          color: white;
          background-color: transparent;
          text-decoration: none;
        }
      </style>

      </style>
  </head>

  <body>
    <img src="SLogo.png" alt="gotogro Logo" width="300" height="90">
    <ul class="horizontal">
      <li><a href="staffHomepage.php">Homepage</a> </li>
      <li><a href="addMemberStaff.php">Add Member</a> </li>
  		<li><a href="#">Add Sales Record</a></li>
  		<li><a href="addGroceryItemStaff.php">Add Grocery Item</a></li>
      <li><a href="#news">Edit Personal Details</a></li>
  	</ul>
        <center>
        <div class = "SignUp">
          <form action= "addMemberStaffServer.php" method="post">
            <?php
              //$id = $_SESSION['id'];
              $query=mysqli_query($mysqli,"SELECT * FROM member ORDER BY member_id DESC LIMIT 1");

              echo "<br><h2> <strong> Please add the new member according to the member id provided. <br>";
              echo "Example: MB001, the new member id should be MB002. </strong></h2>";

              if ($query)
              {
                echo "
                  <table>
                    <tr>
                    <td> <strong> Member ID: </strong> </td> ";
              }

              while($row = mysqli_fetch_array($query))
    					{
    						echo "
                    <td> " .$row['member_id']."</td>
    								</tr>";
  						}
                echo "</table>"
                ?>

            <br><br><br>
            <table>
              <tr>
                <td><b> Member ID </b> </td>
                <td><b> : </b></td>
                <td><input type="text" name="id"><br></td>
              </tr>

              <tr>
                <td><b> Member Name </b> </td>
                <td><b> : </b></td>
                <td><input type="text" name="name"><br></td>
              </tr>

              <tr>
                <td><b> Member IC </b></td>
                <td><b> : </b></td>
                <td><input type="text" name="ic"></td>
              </tr>

              <tr>
                <td><b> Member Phone Number </b></td>
                <td><b> : </b></td>
                <td><input type="text" name="number"><br></td>
              </tr>

              <tr>
                <td><b> Member Address </b></td>
                <td><b> : </b></td>
                <td><textarea name="address" rows='10' cols='30'></textarea></td>
              </tr>
            </table>

            <br><br>

            <input type="submit" name = "add" value ="Add Member">
          </form>
        </div>
      </center>
  </body>
</html>
