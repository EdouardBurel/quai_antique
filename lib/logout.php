<?php
require ('session.php');

session_destroy();
unset($_SESSION);

header('location: login.php');