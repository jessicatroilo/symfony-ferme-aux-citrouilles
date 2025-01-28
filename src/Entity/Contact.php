<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank (message: 'Veuillez renseigner un nom')]
    #[Assert\Length (
        max: 100, 
        min : 2,
        maxMessage: 'Votre nom ne peut pas dépasser {{ limit }} caractères',
        minMessage: 'Votre nom doit contenir au moins {{ limit }} caractères'
        )
    ]
    #[Assert\Regex (pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Votre nom ne peut contenir que des lettres')]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank (message: 'Veuillez renseigner un prénom')]
    #[Assert\Length (
        max: 50, 
        min : 2,
        maxMessage: 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
        minMessage: 'Votre prénom doit contenir au moins {{ limit }} caractères'
        )]
    #[Assert\Regex (pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Votre prénom ne peut contenir que des lettres')]
    private ?string $firstname = null;

    #[ORM\Column(length: 180)]
    #[Assert\Email (message: 'Veuillez renseigner une adresse email valide')]
    #[Assert\NotBlank (message: 'Veuillez renseigner une adresse email')]
    #[Assert\Length (max: 180, maxMessage: 'Votre adresse email ne peut pas dépasser {{ limit }} caractères')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(['Question générale', 'Demande d\'informations', 'Problème technique', 'Autre'])]
    private ?string $subject = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 10,
        max: 1500,
        minMessage: 'Votre message doit contenir minimum {{ limit }} caractères',
        maxMessage: 'Votre message doit contenir maximum {{ limit }} caractères',
    )]
    private ?string $message = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Date]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTimeImmutable();

        return $this;
    }
}
