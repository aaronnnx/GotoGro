<?php
	include "db_conn.php";

	if (empty($_SESSION))
	{
		session_start();
	}
?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Gotogro Login</title>

      <style>
        body
        {
          background-color: #F1E9E8;
          font-family:Montserrat;
          font-size:11px;
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
      </style>
    </head>

    <body>
      <center>
        <img src="BLogo.png" alt="GotoGro Logo">

        <br>
        <br>
        <br>

        <div class = "Login">
          <form action= "login.php" method="post">
            <table>
              <tr>
                <td> <h2> ID </h2> </td>
                <td> <h2> : </h2> </td>
                <td> <input type="text" name="id"> </td>
              </tr>

              <tr>
                <td> <h2> PASSWORD </h2> </td>
                <td> <h2> : </h2> </td>
                <td> <input type="password" name="password"> </td>
              </tr>

              <tr>
                <td> </td>
                <td> <input type="submit" name= "login" value="LOGIN"> </td>
                <td> </td>
              </tr>

            </table>

              <br>
              <br>
              <br>

              <h1> If you forgot your password, contact your supervisor. </h1>
            </form>
          </div>
      </center>

      <?php
      if (isset($_POST["login"]))
      {
        $id = stripslashes($_REQUEST["id"]);
        $id = mysqli_real_escape_string($mysqli, $id);

        $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($mysqli, $password);

        $query = "SELECT * FROM employee WHERE employee_id = '$id' AND employee_password = '$password'";
        $results = mysqli_query($mysqli, $query);

				while($row = mysqli_fetch_array($results))
        {
          $position = $row['employee_position'];
        }

        if ($id == NULL || $password == NULL)
        {
					echo '<script type="text/javascript">';
          echo ' alert("No empty boxes allowed.")';
          echo '</script>';
        }

				else if (mysqli_num_rows($results) != 1)
        {
					echo '<script type="text/javascript">';
					echo ' alert("Wrong Username or Password")';
					echo '</script>';
        }

        else
        {
					$_SESSION["id"] = $id;
					$_SESSION["password"] = $password;

					if ($position == 'Staff')
            header("Location: staffHomepage.php");
          else if ($position == 'Manager')
            header("Location: managerHomepage.php");
					else
						header("Location: supervisorHomepage.php");
        }
    }
    ?>
    </body>
  </html>
