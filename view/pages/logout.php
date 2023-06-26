<?php

session_start();
// unset();
session_unset();
session_destroy();

header("location: login");


?>