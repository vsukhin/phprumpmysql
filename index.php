<?php 
date_default_timezone_set('UTC');
?>
<html>
<body style="font-size: 14pt;">
Hello, <?php echo $_SERVER['REMOTE_ADDR']; ?>
<p>
It is now <?php echo date(DATE_RFC2822); ?>
<p>
Served to you by
<a href="http://nginx.org/">Nginx</a>,
running on a
<a href="http://rumpkernel.org">rump kernel</a>...
<p>
<?php
   $dbhost = 'mysql:3306';
   $dbuser = 'rump';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully to mysql server';
   
   $sql = 'CREATE Database test_db';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   
   echo "Database test_db created successfully\n";

   $sql = 'CREATE TABLE employee( '.
      'emp_id INT NOT NULL AUTO_INCREMENT, '.
      'emp_name VARCHAR(20) NOT NULL, '.
      'emp_address  VARCHAR(20) NOT NULL, '.
      'emp_salary   INT NOT NULL, '.
      'join_date    timestamp(6) NOT NULL, '.
      'primary key ( emp_id ))';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
   
   echo "Table employee created successfully\n";
   
   mysql_close($conn);

   $dbhost = 'myres:3306';
   $dbuser = 'rump';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully to mysql server';
   
   $sql = 'CREATE Database example_db';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   
   echo "Database example_db created successfully\n";

   $sql = 'CREATE TABLE company( '.
      'cmp_id INT NOT NULL AUTO_INCREMENT, '.
      'cmp_name VARCHAR(20) NOT NULL, '.
      'cmp_address  VARCHAR(20) NOT NULL, '.
      'cmp_number_of_employees   INT NOT NULL, '.
      'registration_date    timestamp(6) NOT NULL, '.
      'primary key ( cmp_id ))';
   mysql_select_db('example_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
   
   echo "Table company created successfully\n";
   
   mysql_close($conn);

?>
</body>
</html>