<?php

declare(strict_types=1);

namespace Tapfiliate\Models;

use JsonSerializable;

class Conversion implements JsonSerializable
{
    private ?int $id = null;

    private ?string $referralCode = null;

    private ?string $trackingId = null;

    private ?string $clickId = null;

    private ?int $conversionId = null;

    private ?string $commissionType = null;

    private ?string $conversionSubAmount = null;

    private ?string $coupon = null;

    private ?string $currency = null;

    private ?string $externalId = null;

    private ?float $amount = null;

    private ?string $customerId = null;

    private ?string $comment = null;

    private ?string $createdAt = null;

    private ?string $programGroup = null;

    private ?string $userAgent = null;

    private ?string $ip = null;

    private array $metaData = [];

    private array $click = [];

    private array $commissions = [];

    private array $program = [];

    private array $affiliate = [];

    private array $affiliateMetaData = [];

    private array $warnings = [];

    private array $customer = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Conversion
    {
        $this->id = $id;

        return $this;
    }

    public function getReferralCode(): ?string
    {
        return $this->referralCode;
    }

    public function setReferralCode(?string $referralCode): Conversion
    {
        $this->referralCode = $referralCode;

        return $this;
    }

    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    public function setTrackingId(?string $trackingId): Conversion
    {
        $this->trackingId = $trackingId;

        return $this;
    }

    public function getClickId(): ?string
    {
        return $this->clickId;
    }

    public function setClickId(?string $clickId): Conversion
    {
        $this->clickId = $clickId;

        return $this;
    }

    public function getConversionId(): ?int
    {
        return $this->conversionId;
    }

    public function setConversionId(?int $conversionId): Conversion
    {
        $this->conversionId = $conversionId;

        return $this;
    }

    public function getCommissionType(): ?string
    {
        return $this->commissionType;
    }

    public function setCommissionType(?string $commissionType): Conversion
    {
        $this->commissionType = $commissionType;

        return $this;
    }

    public function getConversionSubAmount(): ?string
    {
        return $this->conversionSubAmount;
    }

    public function setConversionSubAmount(?string $conversionSubAmount): Conversion
    {
        $this->conversionSubAmount = $conversionSubAmount;

        return $this;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $coupon): Conversion
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): Conversion
    {
        $this->currency = $currency;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): Conversion
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): Conversion
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): Conversion
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): Conversion
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): Conversion
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getProgramGroup(): ?string
    {
        return $this->programGroup;
    }

    public function setProgramGroup(?string $programGroup): Conversion
    {
        $this->programGroup = $programGroup;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): Conversion
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): Conversion
    {
        $this->ip = $ip;

        return $this;
    }

    public function getMetaData(): array
    {
        return $this->metaData;
    }

    public function setMetaData(array $metaData): Conversion
    {
        $this->metaData = $metaData;

        return $this;
    }

    public function getClick(): array
    {
        return $this->click;
    }

    public function setClick(array $click): Conversion
    {
        $this->click = $click;

        return $this;
    }

    public function getCommissions(): array
    {
        return $this->commissions;
    }

    public function setCommissions(array $commissions): Conversion
    {
        $this->commissions = $commissions;

        return $this;
    }

    public function getProgram(): array
    {
        return $this->program;
    }

    public function setProgram(array $program): Conversion
    {
        $this->program = $program;

        return $this;
    }

    public function getAffiliate(): array
    {
        return $this->affiliate;
    }

    public function setAffiliate(array $affiliate): Conversion
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    public function getAffiliateMetaData(): array
    {
        return $this->affiliateMetaData;
    }

    public function setAffiliateMetaData(array $affiliateMetaData): Conversion
    {
        $this->affiliateMetaData = $affiliateMetaData;

        return $this;
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function setWarnings(array $warnings): Conversion
    {
        $this->warnings = $warnings;

        return $this;
    }

    public function getCustomer(): array
    {
        return $this->customer;
    }

    public function setCustomer(array $customer): Conversion
    {
        $this->customer = $customer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $arrayOfAttributes = [
            'id' => $this->getId(),
            'referral_code' => $this->getReferralCode(),
            'tracking_id' => $this->getTrackingId(),
            'click_id' => $this->getClickId(),
            'conversion_id' => $this->getConversionId(),
            'commission_type' => $this->getCommissionType(),
            'conversion_sub_amount' => $this->getConversionSubAmount(),
            'coupon' => $this->getCoupon(),
            'currency' => $this->getCurrency(),
            'external_id' => $this->getExternalId(),
            'amount' => $this->getAmount(),
            'customer_id' => $this->getCustomerId(),
            'comment' => $this->getComment(),
            'created_at' => $this->getCreatedAt(),
            'program_group' => $this->getProgramGroup(),
            'user_agent' => $this->getUserAgent(),
            'ip' => $this->getIp(),
            'meta_data' => $this->getMetaData(),
            'click' => $this->getClick(),
            'commissions' => $this->getCommissions(),
            'program' => $this->getProgram(),
            'affiliate' => $this->getAffiliate(),
            'affiliate_meta_data' => $this->getAffiliateMetaData(),
            'warnings' => $this->getWarnings(),
            'customer' => $this->getCustomer(),
        ];

        return array_filter($arrayOfAttributes);
    }
}
