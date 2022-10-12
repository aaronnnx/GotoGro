<?php
  include "db_conn.php";

  if (empty($_SESSION))
  {
    session_start();
  }

  /*if(!isset($_SESSION['id']))
  {
    echo '<script type="text/javascript">';
    echo ' alert("You will need to login first.")';
    echo '</script>';

    header("Location: login.php");
    exit;
  }*/
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      body
      {
        background-color: #F1E9E8;
        font-family: Montserrat;
        font-size: 14px;
      }

      ul
      {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }
      li
      {
        float: left;
      }
      li a, .dropbtn
      {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      li a:hover, .dropdown:hover .dropbtn
      {
        background-color: green;
      }
      li.dropdown
      {
        display: inline-block;
      }
      .dropdown-content
      {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      .dropdown-content a
      {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }
      .dropdown-content a:hover
      {
        background-color: #F1E9E8;
        }
      .dropdown:hover .dropdown-content
      {
        display: block;
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


    </style>
  </head>

<body>
  <img src="SLogo.png" alt="gotogro Logo" width="300" height="90">
  <ul>
    <li><a href="supervisorHomepage.php">Homepage</a> </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Member</a>
        <div class="dropdown-content">
          <a href="addMemberSupervisor.php">Add Member</a>
          <a href="searchMemberEditMemberSupervisor.php">Edit Member</a>
          <a href="#">View Member</a>
        </div>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Sales Record</a>
        <div class="dropdown-content">
          <a href="#">Add Sales Record</a>
          <a href="#">Edit Sales Record</a>
          <a href="#">View Sales Record</a>
        </div>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Grocery Item</a>
        <div class="dropdown-content">
          <a href="addGroceryItemSupervisor.php">Add Grocery Item</a>
          <a href="searchGroceryItemEditGroceryItemSupervisor.php">Edit Grocery Item</a>
          <a href="searchGroceryItemViewGroceryItemSupervisor.php">View Grocery Item</a>
        </div>
    </li>

    <li><a href="#news">Edit Personal Details</a></li>
  </ul>

  <center>
        <div class = "SignUp">
          <form action= "addMemberManagerServer.php" method="post">
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

      <?php
      /*  if(isset($_POST['add']))
        {
          //assign user input to variables
          $id = $_POST["id"];
          $name = $_POST['name'];
          $ic = $_POST['ic'];
          $number = $_POST['number'];
          $address = $_POST['address'];

          $query = "SELECT * FROM member WHERE member_id = '$id'";
          $results = mysqli_query($mysqli, $query);

          //null values
          if (empty($id))
          {
            echo '<script type="text/javascript">';
            echo ' alert("Empty Id is not allowed.")';
            echo '</script>';

            //echo '<center> <h2> Empty Member ID is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
          }
        }*/

       ?>


</body>
</html>
