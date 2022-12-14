<?php

declare(strict_types=1);

namespace Tapfiliate\Models;

use JsonSerializable;

class Customer implements JsonSerializable
{
    private ?string $id = null;

    private ?string $customerId = null;

    private ?string $createdAt = null;

    private ?string $details = null;

    private ?string $status = null;

    private ?string $referralCode = null;

    private ?string $trackingId = null;

    private ?string $clickId = null;

    private ?string $coupon = null;

    private ?string $assetId = null;

    private ?string $sourceId = null;

    private ?string $userAgent = null;

    private ?string $ip = null;

    private array $click = [];

    private array $program = [];

    private array $affiliate = [];

    private array $affiliateMetaData = [];

    private array $warnings = [];

    private array $metaData = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Customer
    {
        $this->id = $id;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): Customer
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): Customer
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): Customer
    {
        $this->details = $details;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): Customer
    {
        $this->status = $status;

        return $this;
    }

    public function getReferralCode(): ?string
    {
        return $this->referralCode;
    }

    public function setReferralCode(?string $referralCode): Customer
    {
        $this->referralCode = $referralCode;

        return $this;
    }

    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    public function setTrackingId(?string $trackingId): Customer
    {
        $this->trackingId = $trackingId;

        return $this;
    }

    public function getClickId(): ?string
    {
        return $this->clickId;
    }

    public function setClickId(?string $clickId): Customer
    {
        $this->clickId = $clickId;

        return $this;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $coupon): Customer
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getAssetId(): ?string
    {
        return $this->assetId;
    }

    public function setAssetId(?string $assetId): Customer
    {
        $this->assetId = $assetId;

        return $this;
    }

    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    public function setSourceId(?string $sourceId): Customer
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): Customer
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): Customer
    {
        $this->ip = $ip;

        return $this;
    }

    public function getClick(): array
    {
        return $this->click;
    }

    public function setClick(array $click): Customer
    {
        $this->click = $click;

        return $this;
    }

    public function getProgram(): array
    {
        return $this->program;
    }

    public function setProgram(array $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getAffiliate(): array
    {
        return $this->affiliate;
    }

    public function setAffiliate(array $affiliate): Customer
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    public function getAffiliateMetaData(): array
    {
        return $this->affiliateMetaData;
    }

    public function setAffiliateMetaData(array $affiliateMetaData): Customer
    {
        $this->affiliateMetaData = $affiliateMetaData;

        return $this;
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function setWarnings(array $warnings): Customer
    {
        $this->warnings = $warnings;

        return $this;
    }

    public function getMetaData(): array
    {
        return $this->metaData;
    }

    public function setMetaData(array $metaData): Customer
    {
        $this->metaData = $metaData;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $arrayOfAttributes = [
            'id' => $this->getId(),
            'customer_id' => $this->getCustomerId(),
            'created_at' => $this->getCreatedAt(),
            'details' => $this->getDetails(),
            'status' => $this->getStatus(),
            'referral_code' => $this->getReferralCode(),
            'tracking_id' => $this->getTrackingId(),
            'click_id' => $this->getClickId(),
            'coupon' => $this->getCoupon(),
            'asset_id' => $this->getAssetId(),
            'source_id' => $this->getSourceId(),
            'user_agent' => $this->getUserAgent(),
            'ip' => $this->getIp(),
            'click' => $this->getClick(),
            'program' => $this->getProgram(),
            'affiliate' => $this->getAffiliate(),
            'affiliate_meta_data' => $this->getAffiliateMetaData(),
            'warnings' => $this->getWarnings(),
            'meta_data' => $this->getMetaData(),
        ];

        return array_filter($arrayOfAttributes);
    }
}
