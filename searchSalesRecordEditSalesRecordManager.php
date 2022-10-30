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
      border: 1px solid #c0c0c0;
      width:80%;
      margin-left: auto;
      margin-right: auto;

    }

    th,td
    {
      border: 1px solid #c0c0c0;
      width: 200px;
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
  </ul>

  <center>
    <div class="topics">
      <h2> Edit Sales Record Search </h2>
      <h3> ➔ Please copy the record id of the selected record to edit. </h3>

      <?php
        $query = "SELECT * FROM record_receipt";
        $results = mysqli_query($mysqli,$query);

        echo "<table>
                <tr>
                  <th style> <strong> Record ID </strong> </th>
                  <th style> <strong> Grand Total </strong> </th>
                  <th style> <strong> Record Date </strong> </th>
                  <th style> <strong> Member ID </strong> </th>
                  <th style> <strong> Click to view sales record details </strong> </td>
                </tr>
              </table>";

              while($row = mysqli_fetch_array($results))
              {
                $id = $row['record_id'];
                echo "
                    <form action='searchGroceryItemEditSalesRecordManager.php' method='post'>

                      <table>
                        <tr>
                        <td style> " .$row['record_id']."</td>
                        <td style> RM" .$row['grand_total']."</td>
                        <td style> " .$row['date']."</td>
                        <td style> " .$row['member_id']."</td>
                        <td style> <button name='edit_sr' value='$id' type='submit'>View Sales Record</button> </td>
                        </tr>
                      </table>";
                  }

      ?>
 </center>
    </div>


</body>
</html>
