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

  <center>
    <div class="ProfTable1">
    <?php
      $id = $_POST["member_id"];
      $_SESSION["id"] = $id;

      $query = "SELECT * from member WHERE member_id = '$id'";
      $results = mysqli_query($mysqli, $query);
      $row = mysqli_fetch_array($results);
    ?>

    <center>
    <div class ="profTable1">
      <form action = "editMemberManagerServer.php" method = "post">
      <table class ="mainInfo" style="width: 70%">
        <h2> Member Info </h2>
        <table>
          <tr>
            <td> <b>Username:</b> </td>
            <td> <strong> <h3> <?php echo $id;?> </strong> </h3> </td>
          </tr>

          <tr>
            <td> <b>Member Name:</b> </td>
            <td> <input type ="text" name="member_name" value="<?php echo $row['member_name'];?>" </td>
          </tr>

          <tr>
            <td> <b>Member IC Number:</b> </td>
            <td> <input type ="text" name="member_ic" value="<?php echo $row['member_ic'];?>" </td>
          </tr>

          <tr>
            <td> <b>Member Phone Number:</b> </td>
            <td> <input type ="number" name="member_number" value="<?php echo $row['member_phone_number'];?>" </td>
          </tr>

          <tr>
            <td> <b>Member Address:</b> </td>
            <td> <textarea name="member_address" rows="10" cols="20"> <?php echo $row['member_address'];?> </textarea> </td>
          </tr>
        </table>
      <br><input type ="submit" name="update" value="Update">
  </form>
  </div>
  </div>


</body>
</html>
