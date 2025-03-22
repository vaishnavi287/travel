<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname = vaishnavi";
   $credentials = "user = vai password = vai123";
   
   $uname = $_POST['name'];
   $password = $_POST['password'];
    $email = $_POST['email'];
    $conpass = $_POST['confirm password'];

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO regist(uname,email,password,conpass)
      VALUES ('$uname','$email','$password','$conpass');

EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>

