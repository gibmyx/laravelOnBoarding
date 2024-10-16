<?php

namespace App\UseCase\Invoice;

use App\Models\InvoiceModel;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Exceptions\InvoiceNotFound;
use App\Interface\InvoiceRepositoryInterface;

class EditInvoice
{
    private $repository;

    public function __construct(InvoiceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $id, InvoiceDTO $dto): void
    {
        $invoice = $this->repository->search($id);

        if (is_null($invoice)) {
            throw new InvoiceNotFound($id);
        }

        $this->repository->update($invoice->id(), $invoice);
    }
}