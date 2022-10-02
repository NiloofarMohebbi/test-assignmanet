<?php

namespace App\Database\Repository;

use App\Lead\Dto\Contract;

/**
 * Represents a Doctrine repository
 */
class ContractRepository
{
    /**
     * @return Contract[]
     */
    public function findContracts(): array
    {
        return [];
    }
}
