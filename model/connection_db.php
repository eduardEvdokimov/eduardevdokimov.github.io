<?php
    define("HOST", 'localhost');
    define("DBNAME", 'gamebomb');
    define("USER_NAME", 'root');
    define("PASSWORD", '');
    define("CHARSET", 'UTF-8');

    function con()
    {
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DBNAME . ';CHARACTER=' . CHARSET;
        try {
            $con = new PDO($dsn, USER_NAME, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $con;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }