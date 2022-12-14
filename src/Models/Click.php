<?php

declare(strict_types=1);

namespace Tapfiliate\Models;

use JsonSerializable;

class Click implements JsonSerializable
{
    private ?string $id = null;

    private ?string $referralCode = null;

    private ?string $sourceId = null;

    private ?string $referrer = null;

    private ?string $landingPage = null;

    private ?string $userAgent = null;

    private ?string $ip = null;

    private array $metaData = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Click
    {
        $this->id = $id;

        return $this;
    }

    public function getReferralCode(): string
    {
        return $this->referralCode;
    }

    public function setReferralCode(string $referralCode): Click
    {
        $this->referralCode = $referralCode;

        return $this;
    }

    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    public function setSourceId(?string $sourceId): Click
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getMetaData(): array
    {
        return $this->metaData;
    }

    public function setMetaData(array $metaData): Click
    {
        $this->metaData = $metaData;

        return $this;
    }

    public function getReferrer(): ?string
    {
        return $this->referrer;
    }

    public function setReferrer(?string $referrer): Click
    {
        $this->referrer = $referrer;

        return $this;
    }

    public function getLandingPage(): ?string
    {
        return $this->landingPage;
    }

    public function setLandingPage(?string $landingPage): Click
    {
        $this->landingPage = $landingPage;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): Click
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): Click
    {
        $this->ip = $ip;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $arrayOfAttributes = [
            'id' => $this->getId(),
            'referral_code' => $this->getReferralCode(),
            'source_id' => $this->getSourceId(),
            'meta_data' => $this->getMetaData(),
            'referrer' => $this->getReferrer(),
            'landing_page' => $this->getLandingPage(),
            'user_agent' => $this->getUserAgent(),
            'ip' => $this->getIp(),
        ];

        return array_filter($arrayOfAttributes);
    }
}
