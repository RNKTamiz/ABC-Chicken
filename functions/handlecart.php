<?php

session_start();
include('../config/dbcon.php');

if(isset($_SESSION['auth']))
{
    if(isset($_POST['scope'])){
        $scope = $_POST['scope'];
        switch($scope)
        {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];

                $user_id = $_SESSION['auth_user']['user_id'];
                
                $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' "; 
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

                if(mysqli_num_rows($chk_existing_cart_run) > 0)
                {
                    echo 300;
                }
                else
                {

                
                    $insert_query = "INSERT INTO carts (user_id,prod_id,prod_qty) VALUES('$user_id','$prod_id','$prod_qty')";
                    $insert_query_run = mysqli_query($con,$insert_query);
                    
                    if($insert_query_run)
                    {
                        echo 201;
                    }
                    else
                    {
                        echo 500;
                    }
                }
                break;
            default:
                echo 500;
        }
    }
}
else
{
    echo 401;
}

?>