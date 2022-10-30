<?php
  include "db_conn.php";

  if(empty($_SESSION))
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

  if(isset($_POST['export'])){
    $itemID = $_POST['itemID'];

    $query=mysqli_query($mysqli,"SELECT*FROM record where item_id = '$itemID' ");

    if($query -> num_rows >0){
      $delimiter = ",";
      $filename = "Each Product Sales Report" .date('Y-m-d'). ".csv";

      //file pointer
      $f = fopen('php://memory' , 'w');

      //set colum headers
      $fields = array('Record ID','Quantity', 'Total Price');
      fputcsv($f,$fields,$delimiter);


      // output each row of the data, format line as csv and write to file pointer
      while($row = $query-> fetch_assoc()){
      $linedata = array($row['record_id'],$row['item_quantity'],$row['item_total_price']);

      fputcsv($f,$linedata,$delimiter);

    }

    //move back to beginning of file
    fseek($f,0);

    // set headers to download file ather than display it
    header('content-type: text/csv');
    header('content-Disposition: attachment; filename=" '.$filename.'";');

    // output all remaining data on a file pointer
    fpassthru($f);
  }
  exit;

  }




?>
