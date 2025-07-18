<?php

namespace Tapfiliate\Models;

class Commission implements \JsonSerializable
{
    private ?int $id = null;
    private ?string $conversionSubAmount = null;
    private ?float $amount = null;
    private ?string $currency = null;
    private ?string $commissionType = null;
    private ?bool $approved = null;
    private ?string $kind = null;
    private ?string $createdAt = null;
    private ?string $comment = null;
    private ?string $commissionName = null;
    private array $affiliate = [];
    private array $conversion = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getConversionSubAmount(): ?string
    {
        return $this->conversionSubAmount;
    }

    public function setConversionSubAmount(?string $conversionSubAmount): void
    {
        $this->conversionSubAmount = $conversionSubAmount;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCommissionType(): ?string
    {
        return $this->commissionType;
    }

    public function setCommissionType(?string $commissionType): void
    {
        $this->commissionType = $commissionType;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(?bool $approved): void
    {
        $this->approved = $approved;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(?string $kind): void
    {
        $this->kind = $kind;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function getCommissionName(): ?string
    {
        return $this->commissionName;
    }

    public function setCommissionName(?string $commissionName): void
    {
        $this->commissionName = $commissionName;
    }

    public function getAffiliate(): array
    {
        return $this->affiliate;
    }

    public function setAffiliate(array $affiliate): void
    {
        $this->affiliate = $affiliate;
    }

    public function getConversion(): array
    {
        return $this->conversion;
    }

    public function setConversion(array $conversion): void
    {
        $this->conversion = $conversion;
    }

    public function jsonSerialize(): array
    {
        $arrayOfAttributes = [
            'id' => $this->id,
            'conversion_sub_amount' => $this->conversionSubAmount,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'commission_type' => $this->commissionType,
            'approved' => $this->approved,
            'kind' => $this->kind,
            'created_at' => $this->createdAt,
            'comment' => $this->comment,
            'commission_name' => $this->commissionName,
            'affiliate' => $this->affiliate,
            'conversion' => $this->conversion,
        ];

        return array_filter($arrayOfAttributes);
    }
}
