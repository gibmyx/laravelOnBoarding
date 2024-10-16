<?php

namespace App\Repository;

use App\Interface\ItemRepositoryInterface;
use App\Models\ItemModel;
use App\Entities\Item;
use App\DTO\ItemDTO;

class ItemRepository implements ItemRepositoryInterface
{
    public function create(array $data): void
    {
        ItemModel::create($data);
    }

    public function search(string $id): ?Item
    {
        $itemModel = ItemModel::find($id);
        return $this->mapToEntity($itemModel);
    }

    public function delete(string $id): void
    {
        ItemModel::destroy($id);
    }

    private function mapToEntity(ItemModel $model): Item
    {
        return new Item(new ItemDTO(
            $model->id,
            $model->factura_id,
            $model->item_id,
            $model->precio_unitario,
            $model->cantidad,
            $model->subtotal,
            $model->impuesto,
            $model->descuento,
            $model->total
        ));
    }
}
