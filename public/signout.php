<?php
require 'class.php';

session_destroy();

$db->redirect('login.php');