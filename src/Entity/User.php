<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Assert\Email (message: 'Veuillez renseigner une adresse email valide')]
    #[Assert\NotBlank (message: 'Veuillez renseigner une adresse email')]
    #[Assert\Length (max: 180, maxMessage: 'Votre adresse email ne peut pas dépasser {{ limit }} caractères')]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

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

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank (message: 'Veuillez renseigner un prénom')]
    #[Assert\Length (
        max: 50, 
        min : 2,
        maxMessage: 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
        minMessage: 'Votre prénom doit contenir au moins {{ limit }} caractères'
        )]
    #[Assert\Regex (pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Votre prénom ne peut contenir que des lettres')]
    private ?string $firstname = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank (message: 'Veuillez renseigner un pseudo')]
    #[Assert\Length (max: 30, maxMessage: 'Votre pseudo ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex (pattern: '/^[a-zA-Z0-9À-ÿ\-\s]+$/', message: 'Votre pseudo ne peut contenir que des lettres et des chiffres')]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message: 'Veuillez renseigner un mot de passe')]
    #[Assert\Length (max: 12, maxMessage: 'Votre mot de passe ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex (
        pattern: '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[a-zA-Z\d\W_]{12,}$/', 
        message: 'Votre mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre  et un caractère spécial'
        )
    ]
    #[Assert\NotCompromisedPassword]
    #[Assert\NotEqualTo (propertyPath: 'email', message: 'Votre mot de passe ne peut pas être identique à votre adresse email')]
    private ?string $password = null; //TODO: Use PasswordStrengthValidator Assert 

    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\Length (max: 50, maxMessage: 'Votre photo ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Url (message: 'Veuillez renseigner une URL valide')]
    #[Assert\Image (mimeTypes: ['image/jpeg', 'image/png'], mimeTypesMessage: 'Veuillez renseigner une image au format jpeg ou png')]
    #[Assert\File (maxSize: '2M', maxSizeMessage: 'Votre photo ne peut pas dépasser {{ limit }}')]
    private ?string $picture = null;


    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * Méthode de validation personnalisée pour vérifier si les termes réservés sont utilisés dans les champs lastname, firstname et pseudo
     *
     * @param ExecutionContextInterface $context
     * @return void
     */
    /*#[Assert\Callback]
    public function validateReservedWords(ExecutionContextInterface $context): void {
    $reservedWords = ['admin', 'root', 'superadmin', 'moderator', 'administrator', 'administrateur', 'modérateur'];

        // Liste des champs à valider
        $fields = [
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'pseudo' => $this->pseudo,
        ];

        foreach ($fields as $fieldName => $value) {
            if (in_array(mb_strtolower($value), $reservedWords, true)) {
                $context->buildViolation('Le terme "{{ value }}" dans le champ "{{ field }}" est réservé.')
                    ->setParameter('{{ value }}', $value)
                    ->setParameter('{{ field }}', $fieldName)
                    ->atPath($fieldName) // Indique le champ concerné
                    ->addViolation();
            }
        }
    }*/


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }



    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }


}
