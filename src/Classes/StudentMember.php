<?php

namespace App\Classes;

class StudentMember extends Member
{
    private array $borrowedBooks = [];

    private int $maxBooks = 3;

    public function __construct(string $memberName)
    {
        parent::__construct($memberName);
    }

    public function canBorrowBooks(): bool
    {
        return count($this->borrowedBooks) < $this->maxBooks;
    }

    // Borrow a book
    public function borrowBook(Book $book): string
    {
        // Check borrowing limit
        if (!$this->canBorrowBooks()) {
            throw new \Exception(
                "You cannot borrow more than 3 books."
            );
        }

        // Reduce available copies
        $book->borrowCopy();

        // Store borrowed book
        $this->borrowedBooks[] = $book;


        return $this->memberName
            . " borrowed "
            . $book->getTitle()
            . "\n";
    }

    // Return a book
    public function returnBook(Book $book): string
    {
        // Check whether this member borrowed the book
        $key = array_search($book, $this->borrowedBooks, true);

        if ($key === false) {
            throw new \Exception(
                "You haven't borrowed this book."
            );
        }

        // Increase available copies
        $book->returnCopy();

        // Remove book from borrowed list
        unset($this->borrowedBooks[$key]);


        return $this->memberName
            . " returned "
            . $book->getTitle()
            . "\n";
    }
}
