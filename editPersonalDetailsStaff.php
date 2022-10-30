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
  <title>Edit Personal Details</title>
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

      .EditDetails
       {
         margin: auto;
  	     border: 3px solid black;
	       padding: 10px;
	       width: 500px;
	       background-color: white;

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
  $emp_id = $_SESSION['id'];
	$query = mysqli_query($mysqli, "SELECT * from employee WHERE employee_id = '$emp_id'");
	$row = mysqli_fetch_array($query);
	?>

  <br><br><br>

  <div class="EditDetails">

  <h1><center>Hello, <?php echo $row['employee_name'];?>!</center></h1>

  <form action="editPersonalDetailsStaff.php" method="post">
    <center>
      <h3> Employee Personal Details </h3>

      <table>
      <table class ="mainInfo" style="width: 70%">

      <tr>
		      <td> <b>Employee ID:</b> </td>
		      <td> <?php echo $row['employee_id'];?> </td>
	   </tr>

      <tr>
        <td> <b>Full Name:</b> </td>
		    <td> <input type ="text" name="name" value="<?php echo $row['employee_name'];?>" </td>
	    </tr>

      <tr>
        <td> <b>Password:</b> </td>
		    <td> <input type ="text" name="pass" value="<?php echo $row['employee_password'];?>" </td>
	    </tr>

      <tr>
        <td> <b>NRIC Number:</b> </td>
		    <td> <input type ="text" name="IcNumber" value="<?php echo $row['employee_ic'];?>" </td>
	    </tr>

      <tr>
        <td> <b>Date of Birth:</b> </td>
		    <td> <input type ="date" name="birthday" value="<?php echo $row['employee_dob'];?>" </td>
	    </tr>

      <tr>
        <td> <b>Age:</b> </td>
		    <td> <?php echo $row['employee_age'];?> </td>
	    </tr>

      <tr>
		    <td> <b>Contact Number:</b> </td>
		    <td> <input type ="number" name="phnum" value="<?php echo $row['employee_phone_number'];?>" </td>
	    </tr>

      <tr>
		    <td> <b>Employee Address:</b> </td>
		    <td> <input type ="text" name="addr" value="<?php echo $row['employee_address'];?>" </td>
	    </tr>

      <tr>
        <td> <b>Position:</b> </td>
		    <td> <?php echo $row['employee_position'];?> </td>
	    </tr>

    </table>


      <h3> Emergency Contact </h3>
      <table class ="emerContact" style ="width: 70%">

        <tr>
		        <td> <b>Name:</b> </td>
		        <td> <input type ="text" name="em_name" value="<?php echo $row['employee_emer_name'];?>" </td>
	      </tr>

        <tr>
		        <td> <b>Contact Number:</b> </td>
		        <td> <input type ="number" name="em_phone" value="<?php echo $row['employee_emer_num'];?>" </td>
	      </tr>

        <tr>
          <?php
          if($row['employee_emer_rela'] == "Father"){
		      ?>
            <td><b>Relationship:</b></td>
                <td>
                  <select name="relation">
                    <option value="Father">-Relationship-</option>
                    <option selected ="selected" value ="Father" > Father </option>
                    <option value ="Mother"> Mother </option>
                    <option value ="Caretaker"> Caretaker </option>
                </td>
      <?php
      } else if($row['employee_emer_rela'] == "Mother"){
      ?>
      <td><b>Relationship:</b></td>
  	    	<td>
				   <select name="relation">
				       <option value="Mother">-Relationship-</option>
				       <option value ="Father"> Father </option>
				       <option selected ="selected" value ="Mother"> Mother </option>
				       <option value ="Caretaker"> Caretaker </option>
          </td>

       <?php
		    	} else if($row['employee_emer_rela'] == "Caretaker") {
		    ?>
		     <td><b>Relationship:</b></td>
  	    	 <td>
				         <select name="relation">
				           <option value="Caretaker">-Relationship-</option>
				           <option value ="Father" > Father </option>
				           <option value ="Mother"> Mother </option>
				           <option selected ="selected" value ="Caretaker"> Caretaker </option>
          </td>
		   <?php
		   	}
          ?>
	    </tr>

      </table>

  </table>

    <br><input type ="submit" name="update" value="Update">

</center>

  </form>
</div>

  <?php

    if(isset($_POST['update'])){
      $empId = $_SESSION['id'];
      $name = $_POST['name'];
      $password = $_POST['pass'];
      $IcNumber = $_POST['IcNumber'];
      //date of birth
      $date = new DateTime($_POST['birthday']);
     	$dob = $date->format('Y-m-d');
      //Age
      $today = date('Y-m-d');
      $diff = date_diff(date_create($dob), date_create($today));
     	$age = $diff->format('%y');

      $phnum = $_POST['phnum'];
      $address = $_POST['addr'];

      $emName = $_POST['em_name'];
      $emPhone = $_POST['em_phone'];
      $relay = $_POST['relation'];

      //update personal details
      $updateQuery = "UPDATE employee SET employee_password = '$password', employee_name = '$name',
                      employee_ic = '$IcNumber', employee_dob = '$dob', employee_age = '$age',
                      employee_phone_number = '$phnum', employee_address = '$address',
					            employee_emer_name = '$emName', employee_emer_num = '$emPhone',
					            employee_emer_rela = '$relay' WHERE employee_id ='$empId'";

			$updateResult = mysqli_query($mysqli, $updateQuery);

        echo '<script type="text/javascript">';
  		  echo ' alert("Profile Updated")';
	  	  echo '</script>';
		    header("refresh:0.01;");

		}
		ob_end_flush();

  ?>


</body>
</html>
