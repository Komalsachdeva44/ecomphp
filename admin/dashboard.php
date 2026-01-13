<?php
session_start();
require_once __DIR__ . '/../app/core/auth.php';
Auth::check();
