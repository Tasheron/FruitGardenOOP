<?php

/**
 * Этот класс просто заполняет сад
 */
class Garden
{
    ///// Параметры сада
    const APPLE_TREES = 10; // Кол-во деревьев
    const PEAR_TREES = 15;
    const APPLES = [
        // Кол-во фруктов на одном дереве
        'minCount' => 40, 
        'maxCount' => 50,
        // Вес одного фрукта
        'minWeight' => 150,
        'maxWeight' => 180,
    ];
    const PEARS = [
        'minCount' => 0,
        'maxCount' => 20,
        'minWeight' => 130,
        'maxWeight' => 170,
    ];
    /////

    /**
     * Виды деревьев
     */
    const TREES = [
        'apple',
        'pear',
    ];

    const TREES_NAMES = [
        'apple' => 'яблок',
        'pear' => 'груш',
    ];

    /**
     * Здесь хранится информация о саде
     * 
     * @var array
     */
    public $garden;

    /**
     * Здесь хранится базовая конфигурация сада
     * 
     * @var array
     */
    public $gardenConfig;

    public function __construct() {
        $this->gardenConfig['appleTrees'] = self::APPLE_TREES;
        $this->gardenConfig['pearTrees'] = self::PEAR_TREES;
        $this->gardenConfig['apples'] = self::APPLES;
        $this->gardenConfig['pears'] = self::PEARS;
    }

    /**
     * Функция заполняет сад в соответствии с азданными параметрами конфигурации
     * 
     * @return void
     */
    public function fillGarden(): void
    {
        foreach(self::TREES as $tree) {
            $this->garden[$tree . 'Trees'] = [];
            for ($i = 0; $i < $this->gardenConfig[$tree . 'Trees']; $i++) {
                $fruitsCount = rand($this->gardenConfig[$tree . 's']['minCount'], $this->gardenConfig[$tree . 's']['maxCount']);
                $fruitsWeight = 0;
                for ($j = 0; $j < $fruitsCount; $j++) {
                    $fruitsWeight += rand($this->gardenConfig[$tree . 's']['minWeight'], $this->gardenConfig[$tree . 's']['maxWeight']);
                }
                array_push($this->garden[$tree . 'Trees'], [
                        'id' => uniqid($tree . '_'), // У каждого дерева свой уникальный номер
                        'fruitsCount' => $fruitsCount,
                        'fruitsWeight' => $fruitsWeight,
                    ]
                );
            }
        }
    }
    
    /**
     * Функция "собирает" все фрукты в саду и возвращает их количество
     * 
     * @return array
     */
    public function collectFruits(): array
    {
        foreach (self::TREES as $tree) {
            $collectedFruits[$tree]['count'] = 0;
            $collectedFruits[$tree]['weight'] = 0;
            for ($i = 0; $i < count($this->garden[$tree . 'Trees']); $i++) {
                $collectedFruits[$tree]['count'] += $this->garden[$tree . 'Trees'][$i]['fruitsCount'];
                $collectedFruits[$tree]['weight'] += $this->garden[$tree . 'Trees'][$i]['fruitsWeight'];
            }
        }
        return $collectedFruits;
    }
}