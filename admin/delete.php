<?php
include_once('utilities.php');
include_once('../models/db/database_utilities.php');

header('Location: index.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
$db = isset( $_GET['db'] ) ? $_GET['db'] : 0;
delete( $id, $db );