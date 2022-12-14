<?php

declare(strict_types=1);

namespace Tapfiliate\Handlers;

use Tapfiliate\Api\ApiClient;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Customer;

class CustomersHandler
{
    private ApiClient $apiClient;

    private ModelFiller $modelHelper;

    public function __construct(
        ApiClient $apiClient,
        ModelFiller $modelHelper
    ) {
        $this->apiClient = $apiClient;
        $this->modelHelper = $modelHelper;
    }

    public function createCustomer(Customer $customer, bool $overrideMaxCookieTime = false): Customer
    {
        $response = $this->apiClient->sendRequest(
            'POST',
            '/customers/',
            ['override_max_cookie_time' => $overrideMaxCookieTime],
            $customer
        );

        return $this->modelHelper->toObject($customer, $response);
    }

    public function deleteCustomer(string $customerId): void
    {
        $this->apiClient->sendRequest(
            'DELETE',
            '/customers/' . $customerId . '/'
        );
    }

    public function getCustomer(string $customerId): Customer
    {
        $response = $this->apiClient->sendRequest(
            'GET',
            '/customers/' . $customerId . '/'
        );

        return $this->modelHelper->toObject(new Customer(), (array) $response);
    }
}
