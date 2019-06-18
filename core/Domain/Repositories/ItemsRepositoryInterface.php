<?php

namespace OneStopSla\Core\Domain\Repositories;

interface ItemsRepositoryInterface
{
    public function createItem($item);
    public function updateItem($item, $id);
}
