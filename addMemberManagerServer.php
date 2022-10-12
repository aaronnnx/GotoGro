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
    <li><a href="managerHomepage.php">Homepage</a> </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Member</a>
        <div class="dropdown-content">
          <a href="addMemberManager.php">Add Member</a>
          <a href="searchMemberEditMemberManager.php">Edit Member</a>
          <a href="searchMemberViewMemberManager.php">View Member</a>
        </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Sales Record</a>
        <div class="dropdown-content">
          <a href="addSalesRecordManager.php">Add Sales Record</a>
          <a href="searchSalesRecordEditSalesRecordManager.php">Edit Sales Record</a>
          <a href="searchSalesRecordViewSalesRecordManager.php">View Sales Record</a>
        </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Grocery Item</a>
        <div class="dropdown-content">
          <a href="addGroceryItemManager.php">Add Grocery Item</a>
          <a href="searchGroceryItemEditGroceryItemManager.php">Edit Grocery Item</a>
          <a href="searchGroceryItemViewGroceryItemManager.php">View Grocery Item</a>
        </div>
    </li>

    <li><a href="#news">Generate Report</a></li>
    <li><a href="#news">Analysis</a></li>
    <li><a href="#news">Notifications</a></li>
    <li><a href="#news">Edit Personal Details</a></li>
  </ul>

  <?php
      if(isset($_POST['add']))
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
          /*echo '<script type="text/javascript">';
          echo ' alert("Empty Id is not allowed.")';
          echo '</script>';*/
          echo '<center> <h2> Empty Member ID is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
        }

        else if (empty($name))
        {
          echo '<center> <h2> Empty Member Name is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
        }

        else if (empty($ic))
        {
          echo '<center> <h2> Empty Member IC Number is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
        }

        else if (empty($number))
        {
          echo '<center> <h2> Empty Member Phone Number is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
        }

        else if (empty($address))
        {
          echo '<center> <h2> Empty Member Address is not allowed. Please click the link below to return to the add member page to try again. </h2> </center>';
        }

        else if (mysqli_fetch_array($results) > 0)
        {
          echo '<center> <h2> Duplicated Member ID. Please click the link below to return to the add member page. </h2> </center>';
        }

        else
        {
           $query = mysqli_query($mysqli, "INSERT INTO member(member_id, member_name, member_ic, member_phone_number, member_address)
           VALUES ('$id', '$name', '$ic', '$number', '$address')");

            //display message
            if($query)
            {
             echo "<center> <h2> Member added successfully. </h2> </center>";

             $query = "SELECT * FROM member where member_id = '$id'";
             $results = mysqli_query($mysqli,$query);

             if ($results != NULL)
             {
               echo "
               <table>
               <tr>
               <td> <strong> Member ID: </strong> </td>
               <td> <strong> Member Name: </strong> </td>
               <td> <strong> Member IC Number: </strong> </td>
               <td> <strong> Member Phone Number: </strong> </td>
               <td> <strong> Member Address: </strong> </td>
               </tr>";
             }

             while($row = mysqli_fetch_array($results))
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
            }
          }
       }

       echo '<br><br> <center> <a href="managerHomepage.php">Click here to the homepage</a> <br><br>';
       echo '<a href="addMemberManager.php">Click here to the add member again.</a> </center>';

       ?>


</body>
</html>
