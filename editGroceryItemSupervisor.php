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
    <div class="groceryInfo">
    <?php
      $id = $_POST["edit_item"];
      $_SESSION["item_id"] = $id;

      $query = "SELECT * from item WHERE item_id = '$id'";
      $results = mysqli_query($mysqli, $query);
      $row = mysqli_fetch_array($results);

      $quan = sprintf("%.2f",$row['item_price']);
    ?>

    <center>
    <div class ="groceryItemDetails">
      <form action = "editGroceryItemSupervisorServer.php" method = "post">
      <table class ="mainInfo" style="width: 70%">
        <h2> Item Info </h2>
        <table>
          <tr>
            <td> <b>Item ID:</b> </td>
            <td> <strong> <h3> <?php echo $id;?> </strong> </h3> </td>
          </tr>

          <tr>
            <td> <b>Item Name:</b> </td>
            <td> <input type ="text" name="item_name" value="<?php echo $row['item_name'];?>" </td>
          </tr>

          <tr>
            <td> <b>Item Price: RM</b> </td>
            <td> <input type ="text" name="item_price" value="<?php echo $quan;?>" </td>
          </tr>

          <tr>
            <td> <b>Item Quantity:</b> </td>
            <td> <input type ="text" name="item_quantity" value="<?php echo $row['item_quantity'];?>" </td>
          </tr>

          <tr>
            <td> <b>Item Category:</b> </td>
            <td> <strong> <?php echo $row['item_category'];?> </strong> </td>
          </tr>

        </table>
      <br><input type ="submit" name="update" value="Update">
  </form>
  </div>
  </div>


</body>
</html>
