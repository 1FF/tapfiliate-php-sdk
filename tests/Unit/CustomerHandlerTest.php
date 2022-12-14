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
use Tapfiliate\Handlers\CustomersHandler;
use Tapfiliate\Helpers\ModelFiller;
use Tapfiliate\Models\Customer;

class CustomerHandlerTest extends TestCase
{
    private CustomersHandler $customersHandler;

    private ModelFiller $modelHelper;

    private MockObject $apiClient;

    protected function setUp(): void
    {
        $this->apiClient = $this->createMock(ApiClient::class);
        $this->modelHelper = new ModelFiller();
        $this->customersHandler = new CustomersHandler($this->apiClient, $this->modelHelper);
    }

    public function testCreateCustomerSuccess(): void
    {
        $customer = new Customer();
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willReturn(['id' => 'cu_eXampl3'])
        ;
        $this->customersHandler->createCustomer($customer);

        $this->assertEquals('cu_eXampl3', $customer->getId());
    }

    public function testDeleteCustomerSuccess(): void
    {
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->with(
                $this->equalTo('DELETE'),
                $this->equalTo('/customers/cu_eXampl3/')
            )
        ;
        $this->customersHandler->deleteCustomer('cu_eXampl3');
    }

    public function testGetCustomerSuccess(): void
    {
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->will(
                $this->returnValue([
                    'id' => 'cu_eXampl3',
                    'customer_id' => 'USER123',
                    'status' => 'trial',
                    'created_at' => '2021-07-02T09:55:20+00:00',
                    'click' => [
                        'created_at' => '2021-03-03T12:39:19+0000',
                        'referrer' => 'https://example-blog.inc/check-out-johns-product/',
                        'landing_page' => 'https://tapper.inc/johns-cool-product/',
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
                    'affiliate_meta_data' => [],
                    'meta_data' => [
                        'foo' => 'bar',
                    ],
                    'warnings' => [],
                ])
            )
        ;

        $response = $this->customersHandler->getCustomer('cu_eXampl3');

        $this->assertInstanceOf(Customer::class, $response);
    }

    /**
     * @dataProvider testCustomerExceptionsProvider
     */
    public function testCreateCustomerExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $customer = new Customer();
        $customer->setReferralCode('test');
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->customersHandler->createCustomer($customer);
    }

    /**
     * @dataProvider testCustomerExceptionsProvider
     */
    public function testDeleteCustomerExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->customersHandler->deleteCustomer('cu_eXampl3');
    }

    /**
     * @dataProvider testCustomerExceptionsProvider
     */
    public function testGetCustomerExceptions(string $exception, int $statusCode): void
    {
        $this->expectException($exception);
        $this->apiClient
            ->expects($this->once())
            ->method('sendRequest')
            ->willThrowException(new $exception($statusCode))
        ;

        $this->customersHandler->getCustomer('cu_eXampl3');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCustomerExceptionsProvider(): array
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
