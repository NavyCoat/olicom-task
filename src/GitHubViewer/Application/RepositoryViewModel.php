<?php
declare(strict_types=1);

namespace App\GitHubViewer\Application;


class RepositoryViewModel implements \JsonSerializable
{
    private string $fullName;
    private string $description;
    private string $cloneUrl;
    private int $stars;
    private \DateTime $createdAt;

    /**
     * RepositoryView constructor.
     * @param string $fullName
     * @param string $description
     * @param string $cloneUrl
     * @param int $stars
     * @param \DateTime $createdAt
     */
    public function __construct(
        string $fullName,
        string $description,
        string $cloneUrl,
        int $stars,
        \DateTime $createdAt
    ) {
        $this->fullName = $fullName;
        $this->description = $description;
        $this->cloneUrl = $cloneUrl;
        $this->stars = $stars;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCloneUrl(): string
    {
        return $this->cloneUrl;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function jsonSerialize(): array
    {
        return [
            'fullName' => $this->fullName,
            'description' => $this->description,
            'cloneUrl' => $this->cloneUrl,
            'stars' => $this->stars,
            'createdAt' => $this->createdAt->format(\DateTime::ATOM),
        ];
    }
}