<?php

require "./User.php";
require "./EmailEnvio.php";
require "./LogCreation.php";
require "./NotifyAdmin.php";

$user = new User();

$user->attach(new EmailEnvio());
$user->attach(new LogCreation());
$user->attach(new NotifyAdmin());

$user->register('Mike', 'mike@email.com');