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

  <center>

        <div class = "SignUp">
          <form action= "addSalesRecordManagerServer2.php" method="post">
            <br><br>
            <table>
              <tr>
                <td> Record ID: </td>
              </tr>
              <tr>
                <td> <?php echo $_SESSION['autoRecordid'] ?> </td>
              </tr>
            </table>

            <br><h2> <strong> Please add the new item. </strong></h2>

            <br><br>

            <table>
                <td><b> Item ID: </b> </td>
                <td>
                  <select type="items" name="itemID">
                    <option value="BB0001">BB0001</option>

                    <option value="BP0001">BP0001</option>
                    <option value="BP0002">BP0002</option>
                    <option value="BP0003">BP0003</option>
                    <option value="BP0004">BP0004</option>
                    <option value="BP0005">BP0005</option>
                    <option value="BP0006">BP0006</option>
                    <option value="BP0007">BP0007</option>
                    <option value="BP0008">BP0008</option>
                    <option value="BP0009">BP0009</option>
                    <option value="BP0010">BP0010</option>

                    <option value="BV0001">BV0001</option>
                    <option value="BV0002">BV0002</option>
                    <option value="BV0003">BV0003</option>
                    <option value="BV0004">BV0004</option>
                    <option value="BV0005">BV0005</option>
                    <option value="BV0006">BV0006</option>
                    <option value="BV0007">BV0007</option>
                    <option value="BV0008">BV0008</option>
                    <option value="BV0009">BV0009</option>
                    <option value="BV0010">BV0010</option>

                    <option value="CC0001">CC0001</option>
                    <option value="CG0001">CG0001</option>
                    <option value="CL0001">CL0001</option>
                    <option value="DG0001">DG0001</option>
                    <option value="DY0001">DY0001</option>
                    <option value="FF0001">MT0001</option>
                    <option value="OT0001">OT0001</option>
                    <option value="PC0001">PC0001</option>

                    <option value="PR0001">PR0001</option>
                    <option value="PR0002">PR0002</option>
                    <option value="PR0003">PR0003</option>
                    <option value="PR0004">PR0004</option>
                    <option value="PR0005">PR0005</option>
                    <option value="PR0006">PR0006</option>
                    <option value="PR0007">PR0007</option>
                    <option value="PR0008">PR0008</option>
                    <option value="PR0009">PR0009</option>
                    <option value="PR0010">PR0010</option>

                    <option value="SF0001">SF0001</option>
                  <br></td>
                </select>
              </tr>

              <tr>
                <td> Quantity: </td>
                <td> <input type="number" name="quantity"> </td>
              </tr>
            </table>

            <br><br>

            <input type="submit" name = "add" value ="Add Item into Record">

          </form>
        </div>
      </center>


</body>
</html>
