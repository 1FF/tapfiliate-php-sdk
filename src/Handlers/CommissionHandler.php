<?php

declare(strict_types=1);

namespace Tapfiliate\Handlers;

use Tapfiliate\Api\ApiClient;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Commission;

class CommissionHandler
{
    private ApiClient $apiClient;
    private ModelFiller $modelHelper;

    public function __construct(
        ApiClient $apiClient,
        ModelFiller $modelHelper,
    ) {
        $this->apiClient = $apiClient;
        $this->modelHelper = $modelHelper;
    }

    public function listCommissions(Commission $commission, ?string $status = null): array
    {
        $result = [];

        $response = $this->apiClient->sendRequest(
            'GET',
            '/commissions/',
            array_filter([
                'status' => $status,
            ]),
            $commission
        );

        foreach ((array)$response as $commissionResponse) {
            $result[] = $this->modelHelper->toObject($commission, (array)$commissionResponse);
        }

        return $result;
    }
}
