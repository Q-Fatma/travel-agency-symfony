<?php

namespace App\Entity;

use App\Repository\SuccessPaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuccessPaymentRepository::class)]
class SuccessPayment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amountTotal = null;

    #[ORM\Column]
    private ?float $amountIncentives = null;

    #[ORM\Column(nullable: true)]
    private ?float $amountBalance = null;

    #[ORM\Column(nullable: true)]
    private ?float $amountOnline = null;

    #[ORM\Column(length: 255)]
    private ?string $orderId = null;

    #[ORM\Column(length: 255)]
    private ?string $transactionId = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountTotal(): ?float
    {
        return $this->amountTotal;
    }

    public function setAmountTotal(float $amountTotal): static
    {
        $this->amountTotal = $amountTotal;

        return $this;
    }

    public function getAmountIncentives(): ?float
    {
        return $this->amountIncentives;
    }

    public function setAmountIncentives(float $amountIncentives): static
    {
        $this->amountIncentives = $amountIncentives;

        return $this;
    }

    public function getAmountBalance(): ?float
    {
        return $this->amountBalance;
    }

    public function setAmountBalance(?float $amountBalance): static
    {
        $this->amountBalance = $amountBalance;

        return $this;
    }

    public function getAmountOnline(): ?float
    {
        return $this->amountOnline;
    }

    public function setAmountOnline(?float $amountOnline): static
    {
        $this->amountOnline = $amountOnline;

        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): static
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): static
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
