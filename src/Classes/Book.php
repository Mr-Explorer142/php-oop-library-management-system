<?php

namespace App\Classes;

use App\Traits\UniqueIdGenerator;

class Book
{
    private string $id;
    private string $title;
    private string $author;
    private int $availableCopies;

    use UniqueIdGenerator;

    public function __construct(
        string $title,
        string $author,
        int $availableCopies
    ) {
        if ($availableCopies < 0) {
            throw new \InvalidArgumentException(
                "Available copies cannot be negative."
            );
        }

        $this->id = $this->generateId("B-");
        $this->title = $title;
        $this->author = $author;
        $this->availableCopies = $availableCopies;
    }

    // Getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getAvailableCopies(): int
    {
        return $this->availableCopies;
    }

    // Borrow a book
    public function borrowCopy(): void
    {
        if ($this->availableCopies <= 0) {
            throw new \Exception("No copies available.");
        }

        $this->availableCopies--;
    }

    // Return a book
    public function returnCopy(): void
    {
        $this->availableCopies++;
    }
}
