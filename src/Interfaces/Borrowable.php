<?php
namespace App\Interfaces;

use App\Classes\Book;

interface Borrowable {
    public function borrowBook(Book $book): string;
    public function returnBook(Book $book): string;
}