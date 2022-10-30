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
    <title>Add Sales Record</title>
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
          <a href="addSalesRecordManagerClient1.php">Add Sales Record</a>
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

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Generate Report</a>
        <div class="dropdown-content">
          <a href="EachProductSalesReportManager.php">Each Product Real-time Sales Report</a>
          <a href="EachMemberSalesReportManager.php">Each Member Sales Report</a>
          <a href="timeRangeSalesReportManager.php">Time Range Sales Report</a>
        </div>
    </li>

    <li><a href="notificationManager.php">Notifications</a></li>
    <li><a href="editPersonalDetailsManager.php">Edit Personal Details</a></li>
    <li><a href = "logout.php">Logout</a></li>
  </ul>

  <?php
          //$id = $_SESSION['id'];
          $query=mysqli_query($mysqli,"SELECT record_id FROM record ORDER BY record_id DESC LIMIT 1");
          $queryRow = mysqli_fetch_array($query);
          $autoId = $queryRow['record_id'];//RC0001


          $substr = substr($autoId, 2); //0001
          $intSubStr = (int) $substr; //2
          $substr = strval(++$intSubStr);

          //echo $substr;
          if ($intSubStr <10)
            $_SESSION['autoRecordid'] = "RC000".$substr;
          else if($intSubStr >9 && $intSubStr <100)
            $_SESSION['autoRecordid'] = "RC00".$substr;
          else if($intSubStr >100 && $intSubStr <1000)
            $_SESSION['autoRecordid'] = "RC0".$substr;
          else
            $_SESSION['autoRecordid'] = "RC".$substr;

            $autoRecordid = $_SESSION['autoRecordid'];

            $memberID = $_POST['memberID'];
            $itemID = $_POST['itemID'];
            $quantity = $_POST["quantity"];
            $date = date("Y-m-d");

          //viewing only
          $query = "SELECT item_name FROM item WHERE item_id = '$itemID'";
          $results = mysqli_query($mysqli, $query);
          $itemName = mysqli_fetch_array($results);
          $displayName = $itemName['item_name'];

          //viewing
          $query = "SELECT item_price FROM item WHERE item_id = '$itemID'";
          $results = mysqli_query($mysqli, $query);
          $itemPrice = mysqli_fetch_array($results);
          $displayPrice = $itemPrice['item_price'];

          //entering into db
          $query = "SELECT item_category FROM item WHERE item_id = '$itemID'";
          $results = mysqli_query($mysqli, $query);
          $itemCategory = mysqli_fetch_array($results);
          $cat = $itemCategory['item_category'];

          //entering into db
          $itemTotalPrice = $displayPrice * $quantity;

          //insert query into db
          $insertQuery = "INSERT into record values('$autoRecordid', '$itemID', '$displayName', '$displayPrice', '$quantity', '$itemTotalPrice', '$cat')";
          $insertQueryResults = mysqli_query($mysqli, $insertQuery);

          if ($insertQuery != NULL)
          {
            $confirmation = "SELECT * from record where record_id = '$autoRecordid'";
            $confirmationQuery = mysqli_query($mysqli, $confirmation);
            ?>

            <center> <h2> Item has been added!</h2> </center>

            <table>
              <tr>
                <td> Record ID: </td>
              </tr>
              <tr>
                <td> <?php echo $autoRecordid; ?>
              </tr>
            </table>

            <br><br>


            <table>
              <tr>
                <td> Record ID: </td>
                <td> Item ID: </td>
                <td> Item Name: </td>
                <td> Item Price: </td>
                <td> Item Quantity: </td>
                <td> Item Total Price: </td>
                <td> Item Category: </td>
              </tr>

            <?php
            while($confirmationRow = mysqli_fetch_array($confirmationQuery))
            {
              echo "<tr>";
                echo "<td>";
                echo $confirmationRow['record_id'];
                echo "</td>";

                echo "<td>";
                echo $confirmationRow['item_id'];
                echo "</td>";

                echo "<td>";
                echo $confirmationRow['item_name'];
                echo "</td>";

                echo "<td>";
                echo sprintf("RM%.2f", $confirmationRow['item_price']);
                echo "</td>";

                echo "<td>";
                echo $confirmationRow['item_quantity'];
                echo "</td>";

                echo "<td>";
                echo sprintf("RM%.2f", $confirmationRow['item_total_price']);
                echo "</td>";

                echo "<td>";
                echo $confirmationRow['item_category'];
                echo "</td>";
                echo "</tr>";

              }
              echo "</table>";

              $updateQuery = "SELECT item_quantity from item where item_id = '$itemID'";
              $updateResults = mysqli_query($mysqli, $updateQuery);
              while ($updateRows = mysqli_fetch_array($updateResults))
              {
                $_SESSION['newQuantity'] = $updateRows['item_quantity'] - $quantity;
              }
              $newQuantity = $_SESSION['newQuantity'];
              $updateQuantityQuery = "UPDATE item SET item_quantity = '$newQuantity' WHERE item_id = '$itemID'";
              $updateQuantityResults = mysqli_query($mysqli, $updateQuantityQuery);

              $receiptQuery = "INSERT INTO record_receipt VALUES ('$autoRecordid','$itemTotalPrice', '$date', '$memberID')";
              $receiptResults = mysqli_query($mysqli, $receiptQuery);

              //notification
              $date = date("Y-m-d");

              if ($newQuantity <3)
              {
                $query=mysqli_query($mysqli,"SELECT notification_id FROM notification ORDER BY notification_id DESC LIMIT 1");
                $queryRow = mysqli_fetch_array($query);
                $notifId = $queryRow['notification_id'];//RC0001

                $substr = substr($notifId, 2); //0001
                $intSubStr = (int) $substr; //2
                $substr = strval(++$intSubStr);

                //echo $substr;
                if ($intSubStr <10)
                  $_SESSION['autoNotifid'] = "NN000".$substr;
                else if($intSubStr >9 && $intSubStr <100)
                  $_SESSION['autoNotifid'] = "NN00".$substr;
                else if($intSubStr >100 && $intSubStr <1000)
                  $_SESSION['autoNotifid'] = "NN0".$substr;
                else
                  $_SESSION['autoNotifid'] = "NN".$substr;

                  $autoNotifid = $_SESSION['autoNotifid'];
                  $notifDesc = "Item ".$itemID." is low in stock, please restock immediately.";

                  $insertNotifQuery = "INSERT into notification values('$autoNotifid', '$notifDesc','$date')";
                  $insertQueryResults = mysqli_query($mysqli, $insertNotifQuery);

              }
              ?>
              <br><br>

              <table>
                <tr>
                  <td> Grand Total </td>
                </tr>
                <tr>
                  <td> <?php echo sprintf("RM%.2f", $itemTotalPrice); ?>
                </tr>
              </table>

                <?php
                $_SESSION['itemTotal'] = $itemTotalPrice;
            }
          echo '<br><br> <center> <a href="addSalesRecordManagerClient1.php">Click here to add a new sales record.</a> <br><br>';
          echo '<a href="addSalesRecordManagerClient2.php">Click here to add more items of this sales record.</a> </center>';

       ?>


</body>
</html>
