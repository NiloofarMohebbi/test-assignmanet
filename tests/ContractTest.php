<?php
use PHPUnit\Framework\TestCase;
use App\Lead\Dto\Contract;
use App\Lead\Dto\Lead;
use App\Lead\ContractValidator;

class ContractTest extends TestCase
{
    public function test_get_valid_contracts()
    {
        $contract1 = new Contract(1, 'contract1', ['London', 'NY', 'Paris'], ['source1', 'source3']);
        $contract2 = new Contract(2, 'contract2', ['London', 'Paris'], ['source1', 'source2', 'source3']);

        $lead1 = new Lead(1, 'London', 'source1');
        $lead2 = new Lead(2, 'L', 'source1');
        $lead3 = new Lead(3, 'NY', 'source1');
        $lead4 = new Lead(4, 'London', 'source2');


        $contractValidator = new ContractValidator();
        $result1 = $contractValidator->getValidContracts($lead1, [$contract1, $contract2]);
        $result2 = $contractValidator->getValidContracts($lead2, [$contract1, $contract2]);
        $result3 = $contractValidator->getValidContracts($lead3, [$contract1, $contract2]);
        $result4 = $contractValidator->getValidContracts($lead4, [$contract1, $contract2]);

        $this->assertEquals([$contract1, $contract2], $result1);
        $this->assertEquals([], $result2);
        $this->assertEquals([$contract1], $result3);
        $this->assertEquals([$contract2], $result4);
    }

    public function test_get_valid_contracts_for_empty_location_and_empty_source()
    {
        $contract1 = new Contract(1, 'contract1', [], ['source1', 'source3']);
        $contract2 = new Contract(2, 'contract2', ['London', 'Paris'], []);

        $lead1 = new Lead(1, 'London', 'source1');

        $contractValidator = new ContractValidator();
        $result1 = $contractValidator->getValidContracts($lead1, [$contract1]);
        $result2 = $contractValidator->getValidContracts($lead1, [$contract2]);

        $this->assertEquals([$contract1], $result1);
        $this->assertEquals([$contract2], $result2);
    }
}
