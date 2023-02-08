<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Garden.php';

use PHPUnit\Framework\TestCase;

class GardenTest extends TestCase
{
    public function testFill()
    {
        $garden = new Garden();
        $garden->fillGarden();

        $this->assertCount(Garden::APPLE_TREES, $garden->garden['appleTrees'], 'Количество яблонь не совпадает');
        $this->assertCount(Garden::PEAR_TREES, $garden->garden['pearTrees'], 'Количество груш не совпадает');
    }

    public function testCollect()
    {
        $garden = new Garden();
        $garden->fillGarden();
        $fruits = $garden->collectFruits();

        $this->assertTrue(
            in_array($fruits['apple']['count'],
            range(Garden::APPLES['minCount'] * Garden::APPLE_TREES, Garden::APPLES['maxCount'] * Garden::APPLE_TREES))
        );
        $this->assertTrue(
            in_array($fruits['apple']['weight'],
            range(
                Garden::APPLES['minWeight'] * Garden::APPLES['minCount'] * Garden::APPLE_TREES,
                Garden::APPLES['maxWeight'] * Garden::APPLES['maxCount'] * Garden::APPLE_TREES
            ))
        );
    }
}