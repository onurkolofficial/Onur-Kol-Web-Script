<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$FirstName=$_POST['name'];
$LastName=$_POST['surname'];

$UserName=$_POST['username'];
$Password=$_POST['password'];
$RePassword=$_POST['repassword'];

$Mail=$_POST['mail'];
$Phone=$_POST['phone'];
$Country=$_POST['country'];
$Address=$_POST['address'];

// Generate User ID (keygen module:/config/modules/keygen.php)
$UserId=$KeyGen->CreateKey(50);

// Check Empty Fields.
if(empty($FirstName)){
    echo '<script>alert("'.$_LANG['string_contact_empty_name'].'"); window.location.href="../";</script>';
}
else{
    if(empty($LastName)){
        echo '<script>alert("'.$_LANG['string_empty_surname'].'"); window.location.href="../";</script>';
    }
    else{
        if(empty($UserName)){
            echo '<script>alert("'.$_LANG['string_empty_username'].'"); window.location.href="../";</script>';
        }
        else{
            if(empty($Password)){
                echo '<script>alert("'.$_LANG['string_empty_password'].'"); window.location.href="../";</script>';
            }
            else{
                if(empty($Mail)){
                    echo '<script>alert("'.$_LANG['string_contact_empty_mail'].'"); window.location.href="../";</script>';
                }
                else{
                    // Check Password Match.
                    if($Password==$RePassword){
                        // Create Account.
                        // Convert Password
                        $PasswordMD5=md5($Password);
                        // Run Query
                        $TableRows="id,UserFirstName,UserLastName,UserName,UserPassword,UserMail,UserImage,UserCountry,UserAddress,UserPhone";
                        $TableValues="'$UserId','$FirstName','$LastName','$UserName','$PasswordMD5','$Mail','DEFAULT','$Country','$Address','$Phone'";
                        $QString="INSERT INTO users ($TableRows) VALUES ($TableValues)";
                        if($WebConfig->Query($QString)){
                            // Register Success.
                            echo '<script>alert("'.$_LANG['string_success_register_account'].'"); window.location.href="/admin/login/";</script>';
                        }
                        else{
                            echo '<script>alert("'.$_LANG['string_unknown_error'].' '.$_LANG['string_try_again_text'].'"); window.location.href="../";</script>';
                        }

                    }
                    else{
                        echo '<script>alert("'.$_LANG['string_error_match_password'].'"); window.location.href="../";</script>';
                    }
                }
            }
        }
    }
}
?>