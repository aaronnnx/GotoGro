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

    </style>

<body>
  <img src="SLogo.png" alt="gotogro Logo" width="300" height="90">
	<ul class="horizontal">
    <li><a href="staffHomepage.php">Homepage</a> </li>
    <li><a href="addMemberStaff.php">Add Member</a> </li>
		<li><a href="#">Add Sales Record</a></li>
		<li><a href="#">Add Grocery Item</a></li>
    <li><a href="#news">Edit Personal Details</a></li>
	</ul>
</body>
</html>
