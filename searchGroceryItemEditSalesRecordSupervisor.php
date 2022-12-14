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
      <title>Edit Grocery Item</title>
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
            <a href="addSalesRecordSupervisorClient1.php">Add Sales Record</a>
            <a href="searchSalesRecordEditSalesRecordSupervisor.php">Edit Sales Record</a>
            <a href="searchSalesRecordViewSalesRecordSupervisor.php">View Sales Record</a>
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

      <li><a href="editPersonalDetailsSupervisor.php">Edit Personal Details</a></li>
    </ul>

    <center>
    <div class="topics">
      <h2> Edit Sales Record Grocery Item Search </h2>
      <h3> ??? Please copy the record id of the selected record to edit. </h3>

      <?php
        $id = $_POST['edit_sr'];
        $_SESSION['sr_id'] = $id;

        $query = "SELECT * FROM record where record_id = '$id'";
        $results = mysqli_query($mysqli,$query);

        echo "<table>
                <tr>
                  <th style='width:500px'> <strong> Record ID </strong> </th>
                </tr>

                <tr>
                  <td> ".$id."</td>
              </table> <br><br>";



              echo "<table>
                      <tr>
                        <th style='width:500px'> <strong> Item ID </strong> </th>
                        <th style='width:500px'> <strong> Item Name </strong> </th>
                        <th style='width:500px'> <strong> Item Price </strong> </th>
                        <th style='width:500px'> <strong> Item Quantity </strong> </th>
                        <th style='width:500px'> <strong> Item Total Price </strong> </th>
                        <th style='width:500px'> <strong> Item Category </strong> </th>
                        <th style='width:500px'> <strong> Click here to edit item </strong> </th>
                      </tr>
                    </table>";

        if ($results != NULL)
        {
          while($row = mysqli_fetch_array($results))
          {
            $id = $row['item_id'];
            echo "
                <form action='editSalesRecordSupervisorClient.php' method='post'>
                  <table>
                    <tr>
                    <td style='width:500px'> " .$row['item_id']."</td>
                    <td style='width:500px'> " .$row['item_name']."</td>
                    <td style='width:500px'> RM" .$row['item_price']."</td>
                    <td style='width:500px'> " .$row['item_quantity']."</td>
                    <td style='width:500px'> RM" .$row['item_total_price']."</td>
                    <td style='width:500px'> " .$row['item_category']."</td>
                    <td style='width:500px'> <button name='edit_item' value='$id' type='submit'>View Item</button> </td>
                    </tr>
                  </table>";
              }
          }
      ?>
    </center>
    </div>

    </body>
  </html>
