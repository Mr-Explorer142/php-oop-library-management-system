<?php

namespace App\Classes;

class Library
{
    private array $books = [];

    private array $members = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function showBooks(): void
    {
        foreach ($this->books as $book) {
            echo "ID: " . $book->getId() . "\n";
            echo "Title: " . $book->getTitle() . "\n";
            echo "Author: " . $book->getAuthor() . "\n";
            echo "Available Copies: " . $book->getAvailableCopies() . "\n";
            echo "----------------------\n";
        }
    }

    public function addMembers(Member $member): void
    {
        $this->members[] = $member;
    }

    public function showMembers(): void
    {
        foreach ($this->members as $member) {
            echo "ID : " . $member->getId() . "\n";
            echo "Member Name : " . $member->getMemberName() . "\n";
            echo "----------------------\n";
        }
    }
}
