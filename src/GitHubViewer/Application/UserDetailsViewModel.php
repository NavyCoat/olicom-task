<?php


namespace App\GitHubViewer\Application;


class UserDetailsViewModel implements \JsonSerializable
{
    private string $name;
    private string $url;
    private ?string $email;
    private \DateTime $createdAt;

    /**
     * UserDetailsViewModel constructor.
     * @param string $name
     * @param string $url
     * @param string|null $email
     * @param \DateTime $createdAt
     */
    public function __construct(string $name, string $url, ?string $email, \DateTime $createdAt)
    {
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'email' => $this->email,
            'createdAt' => $this->createdAt->format(\DateTime::ATOM),
        ];
    }
}