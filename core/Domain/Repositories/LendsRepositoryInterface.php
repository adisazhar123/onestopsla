<?php


namespace OneStopSla\Core\Domain\Repositories;


interface LendsRepositoryInterface
{
    public function createLend($lendData, $items);
    public function getLendsByUserId($userId);
    public function getAllLends();
    public function findLendWithItems(array $attributes, array $relations);
}
