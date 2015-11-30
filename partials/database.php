<?php
  require_once "DB.php";

  $setup_users = "
    CREATE TABLE users (
      id              SERIAL      PRIMARY KEY,
      first_name      TEXT,
      last_name       TEXT,
      type            CHAR(20),
      email           CHAR(50),
      password        TEXT,
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

  pg_query($db, "DROP TABLE IF EXISTS users");
  pg_query($db, "DROP TABLE IF EXISTS tasks");
  pg_query($db, "DROP TABLE IF EXISTS relationships");
  pg_query($db, "DROP TABLE IF EXISTS locations");
  pg_query($db, "DROP TABLE IF EXISTS saved_locations");
  pg_query($db, "DROP TABLE IF EXISTS settings");

  $result = pg_query($db, $setup_users);
  $result = pg_query($db, $setup_tasks);
  $result = pg_query($db, $setup_relationships);
  $result = pg_query($db, $setup_locations);
  $result = pg_query($db, $setup_saved_locations);
  $result = pg_query($db, $setup_settings);

?>