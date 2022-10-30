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
      <title>Edit Sales Record</title>
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
      <li><a href = "logout.php">Logout</a></li>
    </ul>

    <?php

        $itemID = $_POST['itemID']; //new item id
        //echo $itemID;
        $editItemID = $_SESSION['editItem_id']; //initial item id to be removed
        //echo $editItemID;
        $sr_id = $_SESSION['sr_id']; //record id
        //echo $sr_id;
        $itemQuantity = $_POST['itemQuantity'];//new item quantity

        //find item quantity in item table
        $itemQuan = "SELECT * from item where item_id = '$editItemID'";
        $itemQuanResults = mysqli_query($mysqli, $itemQuan);
        $itemQuanRows = mysqli_fetch_array($itemQuanResults);

        //find initial item quantity in record table
        $initialQuery = "SELECT * FROM record WHERE record_id = '$sr_id' AND item_id = '$editItemID'";
        $initialResults = mysqli_query($mysqli,$initialQuery);

        //add initial quantity to quantity in item table
        while ($initialRow = mysqli_fetch_array($initialResults))
        {
          $addQuantity = $itemQuanRows['item_quantity'] + $initialRow['item_quantity'];
          $addQuantityQuery = "UPDATE item SET item_quantity = '$addQuantity' WHERE item_id = '$editItemID'";
          $addQuantityResults = mysqli_query($mysqli,$addQuantityQuery);
        }

        //item name
        $query = "SELECT item_name FROM item WHERE item_id = '$itemID'";
        $results = mysqli_query($mysqli, $query);
        $itemName = mysqli_fetch_array($results);
        $displayName = $itemName['item_name'];

        //item price
        $query = "SELECT item_price FROM item WHERE item_id = '$itemID'";
        $results = mysqli_query($mysqli, $query);
        $itemPrice = mysqli_fetch_array($results);
        $displayPrice = $itemPrice['item_price'];

        //item category
        $query = "SELECT item_category FROM item WHERE item_id = '$itemID'";
        $results = mysqli_query($mysqli, $query);
        $itemCategory = mysqli_fetch_array($results);
        $cat = $itemCategory['item_category'];

        //item total price
        $itemTotalPrice = $displayPrice * $itemQuantity;

        //insert query into db
        $insertQuery = "UPDATE record set item_id = '$itemID', item_name = '$displayName', item_price = '$displayPrice',
                       item_quantity = '$itemQuantity', item_total_price = '$itemTotalPrice', item_category = '$cat' WHERE
                       record_id = '$sr_id' AND item_id = '$editItemID'";
        $insertQueryResults = mysqli_query($mysqli, $insertQuery);

        $tempPriceQuery = "SELECT SUM(item_total_price) AS total from record where record_id = '$sr_id'";
        $tempPriceResults = mysqli_query($mysqli, $tempPriceQuery);
        $tempPriceRow = mysqli_fetch_array($tempPriceResults);
        $tempPrice = $tempPriceRow['total'];

        $query = "UPDATE record_receipt SET grand_total = '$tempPrice' where record_id = '$sr_id'";
        $updateResult = mysqli_query($mysqli, $query);

        $displayPriceQuery = "SELECT grand_total from record_receipt where record_id = '$sr_id'";
        $displayPriceResults = mysqli_query($mysqli, $displayPriceQuery);
        $displayPriceRow = mysqli_fetch_array($displayPriceResults);

        if ($updateResult == 0)
        {
          echo "Please try again";
        }

        else if ($updateResult == 1)
        {
          echo '<center> <h2> Edit was successful! <br><br>';
          echo 'The table below shows the edited record details. </h2> </center>';

          $viewQuery = mysqli_query($mysqli, "SELECT * FROM record WHERE record_id = '$sr_id'");

          echo "
          <br><br>
              <table>
                <tr>
                  <td> <strong> Record ID: </strong> </td>
                  <td> <strong> Item ID: </strong> </td>
                  <td> <strong> Item Name: </strong> </td>
                  <td> <strong> Item Price: </strong> </td>
                  <td> <strong> Item Quantity: </strong> </td>
                  <td> <strong> Item Total Price: </strong> </td>
                  <td> <strong> Item Category: </strong> </td>
                </tr>";

            while($row = mysqli_fetch_array($viewQuery))
            {
              echo "
                  <tr>
                    <td> " .$row['record_id']."</td>
                    <td> " .$row['item_id']."</td>
                    <td> " .$row['item_name']."</td>
                    <td> " .$row['item_price']."</td>
                    <td> " .$row['item_quantity']."</td>
                    <td> " .$row['item_total_price']."</td>
                    <td> " .$row['item_category']."</td>
                  </tr>";
            }

              echo "</table>
              <table>
                <tr>
                  <td> Grand Total </td>
                  <td> ";
                  echo $displayPriceRow['grand_total'];
                }?>
                </tr>
              </table>

          <br><br> <center> <a href="supervisorHomepage.php">Click here to the homepage</a> <br><br>
          <a href="searchSalesRecordEditSalesRecordSupervisor.php">Click here to the edit sales record details again.</a> </center>






    </body>
  </html>
