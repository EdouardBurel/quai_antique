<?php
require ('session.php');

session_destroy();
unset($_SESSION);

header('location: ../user/login.php');