<?php
session_start();

if (session_destroy()) {
   header("Location: ../Medical-App/login.php");
  
}
