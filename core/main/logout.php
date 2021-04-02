<?php
require_once('connect_db.php');
require_once('forms/session/start.php');
session_destroy();
header("Location: account.php");
