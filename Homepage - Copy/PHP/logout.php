<?php
session_start();
session_unset();
session_destroy();
header("Location: ../HTML/log-in.php");
exit;