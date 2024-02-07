<?php

include_once('init.php');
session_start();

session_unset();

session_destroy();

header('location: login.php');
exit(0);