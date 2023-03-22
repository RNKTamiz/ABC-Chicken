<?php
session_start();
include('config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query="SELECT * FROM $table WHERE status='0'";
  return $query_run = mysqli_query($con, $query);

}

function getSlugActive($table,$slug)
{
    global $con;
    $query="SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
  return $query_run = mysqli_query($con, $query);

}

function getIDActive($table,$id)
{
    global $con;
    $query="SELECT * FROM $table WHERE id='$id' AND status='0'";
  return $query_run = mysqli_query($con, $query);

}

function getProdByCategory($category_id)
{
  global $con;
    $query="SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
  return $query_run = mysqli_query($con, $query);
}
function redirect($url, $message){
    $_SESSION['message'] = $message;
        header('Location: '.$url);
        exit();
}

?>