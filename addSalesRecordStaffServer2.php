<?php
  include "db_conn.php";

  if (empty($_SESSION))
  {
    session_start();
  }
/*  if(!isset($_SESSION['id']))
  {
    echo '<script type="text/javascript">';
    echo ' alert("You will need to login first.")';
    echo '</script>';

    header("Location: login.php");
    exit;
  }*/
?>

<!DOCTYPE html>
  <html lang="en">
  <title>Add Sales Record</title>
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

<body>
  <img src="SLogo.png" alt="gotogro Logo" width="300" height="90">

  <ul class="horizontal">
    <li><a href="staffHomepage.php">Homepage</a> </li>
    <li><a href="addMemberStaff.php">Add Member</a> </li>
		<li><a href="addSalesRecordStaffClient1.php">Add Sales Record</a></li>
		<li><a href="addGroceryItemStaff.php">Add Grocery Item</a></li>
    <li><a href="editPersonalDetailsStaff.php">Edit Personal Details</a></li>
    <li><a href = "logout.php">Logout</a></li>
	</ul>

  <?php
            $recordID = $_SESSION['autoRecordid'];
            $itemID = $_POST['itemID'];
            $quantity = $_POST["quantity"];

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
          $itemTotalPrice = $itemPrice['item_price'] * $quantity;
          $grandTotal = $_SESSION['itemTotal'] + $itemTotalPrice;

          //insert query into db
          $insertQuery = "INSERT into record values('$recordID', '$itemID', '$displayName', '$displayPrice', '$quantity', '$itemTotalPrice', '$cat')";
          $insertQueryResults = mysqli_query($mysqli, $insertQuery);

          if ($insertQuery != NULL)
          {
            $confirmation = "SELECT * from record where record_id = '$recordID'";
            $confirmationQuery = mysqli_query($mysqli, $confirmation);
            ?>

            <center> <h2> Item has been added!</h2> </center>

            <table>
              <tr>
                <td> Record ID: </td>
              </tr>
              <tr>
                <td> <?php echo $recordID; ?>
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

              $receiptQuery = "UPDATE record_receipt SET grand_total = '$grandTotal' where record_id = '$recordID'";
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
                  <td> Sales Record Grand Total </td>
                </tr>
                <tr>
                  <td> <?php echo sprintf("RM%.2f", $grandTotal); ?>
                </tr>
              </table>

              <br><br>


                <?php
                $_SESSION['itemTotal'] = $grandTotal;
            }
          echo '<br><br> <center> <a href="addSalesRecordStaffClient1.php">Click here to add a new sales record.</a> <br><br>';
          echo '<a href="addSalesRecordStaffClient2.php">Click here to add more items of this sales record.</a> </center>';

       ?>




</body>
</html>
