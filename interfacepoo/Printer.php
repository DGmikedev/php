<?php

require __DIR__ . "\EmailNotifier.php";
require __DIR__ . "\SmsNotifier.php";
require __DIR__ . "\PrinterService.php";

$notifier = new EmailNotifier();
$sms = new SmsNotifier();

$notifier->notify("MENSAJE 1");
echo "<br>";

$sms->notify("MENSAJE 2");
echo "<br>";

$service = new PrinterService(new EmailNotifier());
$service->notificar("Envio de mensaje desde una clase que no tiene el metodo notify! ");

echo "<br>";

$service2 = new PrinterService( new SmsNotifier());
$service2->notificar("Este mensje se manda desde sms service que no tienen esta funcionalidad");
