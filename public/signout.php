<?php
require 'class.php';

session_destroy();

$db->redirect('signin.php');