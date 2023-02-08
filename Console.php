<?php

/**
 * Класс для работы с консолью
 */
class Console
{
    /**
     * Выводит информацию об инициации сада
     * 
     * @return void
     */
    public static function initGarden(): void
    {
        system('clear');
        echo "Начинаю выращивать сад...\n";
        sleep(3);
    }

    /**
     * Выводит информацию о начале сбора фруктов
     * 
     * @return void
     */
    public static function collectFruits(): void
    {
        echo "Все фрукты созрели! Отправляю сборщик собирать урожай...\n";
        sleep(3);
    }

    /**
     * Выводит информацию о собранных фруктах
     * 
     * @param array $fruits
     * 
     * @return void
     */
    public static function showFruits(array $fruits): void
    {
        echo "Сборщик вернулся и принес с собой:\n";
        foreach (Garden::TREES as $tree) {
            echo sprintf(
                "-> %d %s общим весом %d г.\n",
                $fruits[$tree]['count'],
                Garden::TREES_NAMES[$tree],
                $fruits[$tree]['weight']
            );
        }
    }

    /**
     * Выводит информацию о саде
     * 
     * @param array $garden
     * 
     * @return void
     */
    public static function showGarden(array $garden): void
    {
        readline("Нажмите Enter для просмотра структуры сада...\n");
        print_r($garden);
    }
}