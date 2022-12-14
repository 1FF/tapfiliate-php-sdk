<?php

declare(strict_types=1);

namespace Tapfiliate\Handlers;

use Tapfiliate\Api\ApiClient;
use Tapfiliate\Api\Exceptions\MethodNotFoundException;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Conversion;

class ConversionsHandler
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

    public function createConversion(
        Conversion $conversion,
        bool $overrideMaxCookieTime = false
    ): Conversion {
        $response = $this->apiClient->sendRequest(
            'POST',
            '/conversions/',
            [
                'override_max_cookie_time' => $overrideMaxCookieTime,
            ],
            $conversion
        );

        return $this->modelHelper->toObject($conversion, (array) $response);
    }

    public function deleteConversion(int $conversionId): void
    {
        $this->apiClient->sendRequest(
            'DELETE',
            '/conversions/' . $conversionId . '/'
        );
    }

    /**
     * @throws MethodNotFoundException
     */
    public function getConversion(int $conversionId): Conversion
    {
        $response = $this->apiClient->sendRequest(
            'GET',
            '/conversions/' . $conversionId . '/'
        );

        return $this->modelHelper->toObject(new Conversion(), (array) $response);
    }
}
