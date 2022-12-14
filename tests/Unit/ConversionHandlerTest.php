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
use Tapfiliate\Handlers\ConversionsHandler;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Conversion;

class ConversionHandlerTest extends TestCase
{
    private ConversionsHandler $conversionsHandler;

    private ModelFiller $modelHelper;

    private MockObject $apiClient;

    protected function setUp(): void
    {
        $this->apiClient = $this->createMock(ApiClient::class);
        $this->modelHelper = new ModelFiller();
        $this->conversionsHandler = new ConversionsHandler($this->apiClient, $this->modelHelper);
    }

    public function testCreateCustomerSuccess(): void
    {
        $conversion = new Conversion();
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willReturn(['id' => 1])
        ;
        $this->conversionsHandler->createConversion($conversion);

        $this->assertEquals(1, $conversion->getId());
    }

    public function testDeleteCustomerSuccess(): void
    {
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->with(
                $this->equalTo('DELETE'),
                $this->equalTo('/conversions/1/')
            )
        ;
        $this->conversionsHandler->deleteConversion(1);
    }

    public function testGetConversionSuccess(): void
    {
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->will(
                $this->returnValue([
                    'id' => 1,
                    'external_id' => 'ORD123',
                    'amount' => 550,
                    'click' => [
                        'created_at' => '2021-03-03T12:39:19+0000',
                        'referrer' => 'https://example-blog.inc/check-out-johns-product/',
                        'landing_page' => 'https://tapper.inc/johns-cool-product/',
                    ],
                    'commissions' => [
                        [
                            'id' => 1,
                            'conversion_sub_amount' => 550,
                            'amount' => 55,
                            'commission_type' => 'standard',
                            'approved' => true,
                            'affiliate' => [
                                'id' => 'janejameson',
                                'firstname' => 'Jane',
                                'lastname' => 'Jameson',
                            ],
                            'kind' => 'regular',
                            'currency' => 'USD',
                            'created_at' => null,
                            'payout' => null,
                            'comment' => null,
                            'final' => null,
                        ],
                    ],
                    'program' => [
                        'id' => 'johns-affiliate-program',
                        'title' => "John's affiliate program",
                        'currency' => 'USD',
                    ],
                    'affiliate' => [
                        'id' => 'janejameson',
                        'firstname' => 'Jane',
                        'lastname' => 'Jameson',
                    ],
                    'customer' => [
                        'id' => 'cu_eXampl30th3r',
                        'customer_id' => 'USER999',
                        'status' => 'paying',
                    ],
                    'affiliate_meta_data' => [],
                    'meta_data' => [
                        'foo' => 'bar',
                        'tap' => 'awesome',
                    ],
                    'created_at' => '2021-03-03T12:39:19+0000',
                    'warnings' => [],
                ])
            )
        ;

        $response = $this->conversionsHandler->getConversion(1);

        $this->assertInstanceOf(Conversion::class, $response);
    }

    /**
     * @dataProvider testConversionExceptionsProvider
     */
    public function testCreateCustomerExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $customer = new Conversion();
        $customer->setExternalId('TEST123');
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->conversionsHandler->createConversion($customer);
    }

    /**
     * @dataProvider testConversionExceptionsProvider
     */
    public function testDeleteCustomerExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->conversionsHandler->deleteConversion(1);
    }

    /**
     * @dataProvider testConversionExceptionsProvider
     */
    public function testGetConversionExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->conversionsHandler->getConversion(1);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConversionExceptionsProvider(): array
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
