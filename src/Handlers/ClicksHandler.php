<?php

declare(strict_types=1);

namespace Tapfiliate\Handlers;

use Tapfiliate\Api\ApiClient;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Click;

class ClicksHandler
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

    public function createClick(Click $click): Click
    {
        $response = $this->apiClient->sendRequest(
            'POST',
            '/clicks/',
            [],
            $click
        );

        return $this->modelHelper->toObject($click, (array) $response);
    }
}
