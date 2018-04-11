<?php

$date = new DateTime($event['date']);
$now = new DateTime();

if($date < $now) {
    echo 'date is in the past';
}