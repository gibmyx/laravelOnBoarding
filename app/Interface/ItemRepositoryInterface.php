<?php

namespace App\Interface;

use App\Entities\Item;

interface ItemRepositoryInterface
{
    public function create(array $data): void;

    public function search(string $id): ?Item;

    public function delete(string $id): void;
}
