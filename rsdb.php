<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname = vaishnavi";
   $credentials = "user = vai password = vai123";
   
   $uname = $_POST['full_name'];
   $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $srequests = $_POST['special_requests'];
    
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO reserv(uname,phone,email,rdate,rtime,srequests)
      VALUES ('$uname','$phone','$email','$date','$time','$srequests');

EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>

