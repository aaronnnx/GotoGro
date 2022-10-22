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
          <a href="addGroceryItemSupervisor.php">Add Grocery Item</a>
          <a href="searchGroceryItemEditGroceryItemSupervisor.php">Edit Grocery Item</a>
          <a href="searchGroceryItemViewGroceryItemSupervisor.php">View Grocery Item</a>
        </div>
    </li>

    <li><a href="#news">Edit Personal Details</a></li>
  </ul>

  <center>
    <div class="topics">
      <h2> View Grocery Item </h2>

      <?php
        $query = "SELECT * FROM item";
        $results = mysqli_query($mysqli,$query);

        echo "<table>
                <tr>
                  <td style='width:500px'> <strong> Item ID </strong> </td>
                  <td style='width:500px'> <strong> Item Name </strong> </td>
                  <td style='width:500px'> <strong> Click to view grocery item details </strong> </td>
                </tr>
              </table>";

              if ($results != NULL)
              {
                while($row = mysqli_fetch_array($results))
                {
                  $id = $row['item_id'];
                  //$_SESSION['member_id'] = $id;*/
                  echo "
                    <form action='viewGroceryItemSupervisorServer.php' method='post'>
                      <table>
                      <tr>
                        <td style='width:500px'> " .$row['item_id']."</td>
                        <td style='width:500px'> " .$row['item_name']."</td>
                        <td style='width:500px'> <button name='view_item' value='$id' type='submit'>View Item</button> </td>
                      </tr>
                      </table>
                    </form>";
                  }
                }

      ?>

       <!--<div class="application">
        <form action="viewGroceryItemSupervisorServer.php" method="post">
          <br>
          <br>
          <table>
            <tr>
              <td> <strong> Item ID: </strong> </td>
              <td> <input type="text" name="item_id"> </td>
            </tr>
          </table>

            <br>
            <br>

           <input type="submit" class="button2" name="Submit" value="Submit">
        </form>-->


        <br>
        <br>
    </div> </center>
    </div>

</body>
</html>
