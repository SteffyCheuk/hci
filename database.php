<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d2ffsrfmtpiq4e host=ec2-54-83-202-218.compute-1.amazonaws.com port=5432 user=pcxjnmoniwdgvr password=b7NGpwu_ELAol4LuUL3AcvoXN_ sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
  echo "Database connection error.";
}
 
$setup_users = "
  CREATE TABLE users (
    id              INT         PRIMARY KEY,
    first_name      TEXT,
    last_name       TEXT,
    type            CHAR(20),
    email           CHAR(50),
    phone           CHAR(10)
  );";

$setup_tasks = " 
  CREATE TABLE tasks (
    id              INT         PRIMARY KEY,    
    older_adult_id  INT,
    owner_id        INT,
    title           TEXT,
    description     TEXT,
    location        TEXT,
    deadline        TIMESTAMP,
    done            BOOLEAN,
    notified        BOOLEAN
  );";

$setup_relationships = "
  CREATE TABLE relationships (
    id              INT         PRIMARY KEY,
    caregiver_id    INT,
    older_adult_id  INT,
    permissions     BOOLEAN
  );";

$setup_locations = "
  CREATE TABLE locations (
    id              INT         PRIMARY KEY,
    older_adult_id  INT,
    date            DATE,
    time            TIME,
    location        TEXT,
    long            DECIMAL,
    lat             DECIMAL
  );";

$setup_saved_locations = "
  CREATE TABLE saved_locations (
    id              INT         PRIMARY KEY,
    older_adult_id  INT,
    name            TEXT,
    location        TEXT,
    long            DECIMAL,
    lat             DECIMAL
  );";

$setup_settings = "
  CREATE TABLE settings (
    id              INT         PRIMARY KEY,
    user_id         INT,
    font_size       TEXT,
    language        TEXT,
    sound           INT
  );";

$result = pg_query($db, $setup_users);
$result = pg_query($db, $setup_tasks);
$result = pg_query($db, $setup_relationships);
$result = pg_query($db, $setup_locations);
$result = pg_query($db, $setup_saved_locations);
$result = pg_query($db, $setup_settings);

?>