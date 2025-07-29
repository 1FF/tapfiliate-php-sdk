<?php

declare(strict_types=1);

namespace Tapfiliate\Handlers;

use Tapfiliate\Api\ApiClient;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Commission;

class CommissionHandler
{
    private const ALLOWED_STATUSES = ['pending', 'approved', 'disapproved'];

    private ApiClient $apiClient;
    private ModelFiller $modelHelper;

    public function __construct(
        ApiClient $apiClient,
        ModelFiller $modelHelper,
    ) {
        $this->apiClient = $apiClient;
        $this->modelHelper = $modelHelper;
    }

    public function listCommissions(?string $status = null): array
    {
        $result = [];
        $commission = new Commission();

        if ($status && !in_array($status, self::ALLOWED_STATUSES)) {
            throw new \RuntimeException('status can only be one of: ' . implode(',', self::ALLOWED_STATUSES));
        }

        $response = $this->apiClient->sendRequest(
            'GET',
            '/commissions/',
            array_filter([
                'status' => $status,
            ]),
            $commission
        );

        foreach ((array)$response as $commissionResponse) {
            $result[] = $this->modelHelper->toObject(new Commission(), (array)$commissionResponse);
        }

        return $result;
    }

    public function approveCommission(int $id): Commission
    {
        $commission = new Commission();

        $response = $this->apiClient->sendRequest(
            'PUT',
            "/commissions/$id/approved/",
            [],
            $commission
        );

        return $this->modelHelper->toObject($commission, (array)$response);
    }

    public function disapproveCommission(int $id): Commission
    {
        $commission = new Commission();

        $response = $this->apiClient->sendRequest(
            'DELETE',
            "/commissions/$id/approved/",
            [],
            $commission
        );

        return $this->modelHelper->toObject($commission, (array)$response);
    }
}
