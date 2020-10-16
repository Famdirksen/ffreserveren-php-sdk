<?php

namespace Famdirksen\FFReserverenPhpSdk\Actions;

use Famdirksen\FFReserverenPhpSdk\Resources\Customer;

trait ManagesCustomers
{
    public function customers(): array
    {
        return $this->transformCollection(
            $this->get('customers')['data'],
            Customer::class
        );
    }

    public function customer(int $customerId): Customer
    {
        $customerAttributes = $this->get("customers/{$customerId}");

        return new Customer($customerAttributes, $this);
    }

    public function createCustomer(array $data): Customer
    {
        $customerAttributes = $this->post('customers', $data);

        return new Customer($customerAttributes, $this);
    }

    public function deleteCustomer(int $customerId)
    {
        $this->delete("customers/$customerId");
    }
}
