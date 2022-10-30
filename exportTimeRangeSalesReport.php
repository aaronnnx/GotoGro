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
    $from_date= $_POST['fromDate'];
    $to_date= $_POST['toDate'];

    $query=mysqli_query($mysqli,"SELECT*FROM record_receipt where date between '".$from_date."' and '".$to_date."'");

    if($query -> num_rows >0){
      $delimiter = ",";
      $filename = "Time Range Sales Report" .date('Y-m-d'). ".csv";

      //file pointer
      $f = fopen('php://memory' , 'w');

      //set colum headers
      $fields = array('Record ID','Member ID','Grand Total','From '.$from_date. ' To '.$to_date);
      fputcsv($f,$fields,$delimiter);


      // output each row of the data, format line as csv and write to file pointer
      while($row = $query-> fetch_assoc()){
      $linedata = array($row['record_id'],$row['member_id'],$row['grand_total'],$row['date']);

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
