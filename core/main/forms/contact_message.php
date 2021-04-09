<?php
require_once('session/start.php');
$_SESSION['contact_message'] = true;
header("Location: ../contact.php");
