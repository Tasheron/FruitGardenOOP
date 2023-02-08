<?php

require_once __DIR__ . '/Garden.php';
require_once __DIR__ . '/Console.php';

$showGarden = getopt('s::');

Console::initGarden();

$garden = new Garden();
$garden->fillGarden();

Console::collectFruits();
Console::showFruits($garden->collectFruits());

if ($showGarden) {
    Console::showGarden($garden->garden);
}