<?php
session_start();
if (isset($_SESSION['username'])) {
   echo "hi";
} 
include "index.html";
?>