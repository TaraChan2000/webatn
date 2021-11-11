<?php
    $conn = pg_connect("postgres://dcyptriyociycl:bddd02d896698d806b2831bf5ced6eac69e080f71b153621f6ebf521034948bc@ec2-34-192-174-151.compute-1.amazonaws.com:5432/d9eo07kpacoht7");
    //$conn = pg_connect("postgresql://postgres:danhtara2000@localhost:5432/postgres");
    if(!$conn){
        die("Can not connect database");
    } 
?>