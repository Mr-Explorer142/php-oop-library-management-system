<?php

namespace App\Classes;

use Exception;

class TeacherMember extends Member
{
    private array $borrowedBooks = [];

    private int $maxBooks = 10;

    public function __construct(string $memberName)
    {
        parent::__construct($memberName);
    }

    public function canBorrowBooks(): bool
    {
        return count($this->borrowedBooks) < $this->maxBooks;
    }

    public function borrowBook(Book $book): string
    {
        // borrowing limit
        if (!$this->canBorrowBooks()) {
            throw new Exception("You cannot borrow more than 10 books\n");
        }

        // reduce copies
        $book->borrowCopy();

        // store borrowd books
        $this->borrowedBooks[] = $book;


        // showing the final result
        return $this->memberName . " borrowed " . $book->getTitle() . "\n";
    }

    public function returnBook(Book $book): string
    {
        // check whether this book was borrowd or not
        $key = array_search($book, $this->borrowedBooks, true);

        // if not
        if ($key === false) {
            throw new Exception("You did not borrow this book\n");
        }

        // if yes
        $book->returnCopy();

        // Remove book from borrowed list
        unset($this->borrowedBooks[$key]);

        // showing the final result
        return $this->memberName . " returned " . $book->getTitle() . "\n";
    }
}
