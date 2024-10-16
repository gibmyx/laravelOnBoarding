<?php

namespace App\UseCase\Invoice;

use App\Entity\Invoice;
use App\Exceptions\InvoiceNotFound;
use App\Interface\InvoiceRepositoryInterface;

class SearchInvoice
{
    public function __construct(private InvoiceRepositoryInterface $repository)
    {}

    public function execute(string $id): ?Invoice
    {
        $search = $this->repository->search($id);

        if (is_null($search)) {
            throw new InvoiceNotFound($id);
        }

        return $search;
    }
}