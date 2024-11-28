<?php
session_start();
require_once 'controllers/Main.php';

$action = $_GET['action'] ?? 'home';
$id = $_GET['id'] ?? null;

Main::route($action, $id);