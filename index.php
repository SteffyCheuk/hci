<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d2ffsrfmtpiq4e host=ec2-54-83-202-218.compute-1.amazonaws.com port=5432 user=pcxjnmoniwdgvr password=b7NGpwu_ELAol4LuUL3AcvoXN_ sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
  echo "Database connection error."
  exit;
}
else {
  echo "<html> <h1> Hello! </h1> </html> "
}
 
// $result = pg_query($db, "SELECT statement goes here");
?>