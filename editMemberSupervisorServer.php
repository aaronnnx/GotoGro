<?php
  include "db_conn.php";

  if(empty($_SESSION))
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
      .dropdown-content a {
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
            <a href="searchMemberViewMemberSupervisor.php">View Member</a>
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
            <a href="#">Add Grocery Item</a>
            <a href="#">Edit Grocery Item</a>
            <a href="#">View Grocery Item</a>
          </div>
      </li>

      <li><a href="#news">Edit Personal Details</a></li>
    </ul>


    <?php
        $id = $_SESSION["id"];
        $name = $_POST['member_name'];
        $ic = $_POST['member_ic'];
        $number = $_POST['member_number'];
        $address = $_POST['member_address'];

        $query = "UPDATE member SET member_name = '$name', member_ic = '$ic', member_phone_number = '$number', member_address = '$address' WHERE member_id ='$id'";
        $updateResult = mysqli_query($mysqli, $query);

        if ($updateResult == 0)
        {
          echo "Please try again";
        }

        else if ($updateResult == 1)
        {
          echo '<center> <h2> Edit was successful! <br><br>';
          echo 'The table below shows the edited member details. </h2> </center>';

          $viewQuery = mysqli_query($mysqli, "SELECT * FROM member WHERE member_id = '$id'");

          echo "
          <br><br>
              <table>
                <tr>
                  <td> <strong> Member ID: </strong> </td>
                  <td> <strong> Member Name: </strong> </td>
                  <td> <strong> Member IC Number: </strong> </td>
                  <td> <strong> Member Phone Number: </strong> </td>
                  <td> <strong> Member Address: </strong> </td>
                </tr>";

            while($row = mysqli_fetch_array($viewQuery))
            {
              echo "
                  <tr>
                    <td> " .$row['member_id']."</td>
                    <td> " .$row['member_name']."</td>
                    <td> " .$row['member_ic']."</td>
                    <td> " .$row['member_phone_number']."</td>
                    <td> " .$row['member_address']."</td>
                  </tr>";
              }

              echo "</table>";

          echo '<br><br> <center> <a href="supervisorHomepage.php">Click here to the homepage</a> <br><br>';
          echo '<a href="searchMemberEditMemberSupervisor.php">Click here to the edit member details again.</a> </center>';
        }
    ?>
    </body>
  </html>
