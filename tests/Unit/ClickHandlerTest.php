<?php

declare(strict_types=1);

namespace Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tapfiliate\Api\ApiClient;
use Tapfiliate\Api\Exceptions\AccessDeniedException;
use Tapfiliate\Api\Exceptions\BadRequestException;
use Tapfiliate\Api\Exceptions\InternalServerErrorException;
use Tapfiliate\Api\Exceptions\MethodNotFoundException;
use Tapfiliate\Api\Exceptions\ServiceUnavailableException;
use Tapfiliate\Api\Exceptions\UnauthorizedException;
use Tapfiliate\Handlers\ClicksHandler;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Click;

class ClickHandlerTest extends TestCase
{
    private ClicksHandler $clicksHandler;

    private ModelFiller $modelHelper;

    private MockObject $apiClient;

    protected function setUp(): void
    {
        $this->apiClient = $this->createMock(ApiClient::class);
        $this->modelHelper = new ModelFiller();
        $this->clicksHandler = new ClicksHandler($this->apiClient, $this->modelHelper);
    }

    public function testCreateClickSuccess(): void
    {
        $click = new Click();
        $click->setReferralCode('test');
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willReturn(['id' => 'TEST11'])
        ;
        $this->clicksHandler->createClick($click);

        $this->assertEquals('TEST11', $click->getId());
    }

    /**
     * @dataProvider testClickExceptionsProvider
     */
    public function testCreateClickExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $click = new Click();
        $click->setReferralCode('test');
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->clicksHandler->createClick($click);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testClickExceptionsProvider(): array
    {
        return [
            [BadRequestException::class, 400],
            [UnauthorizedException::class, 401],
            [AccessDeniedException::class, 403],
            [MethodNotFoundException::class, 404],
            [InternalServerErrorException::class, 500],
            [ServiceUnavailableException::class, 503],
        ];
    }
}
