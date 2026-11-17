<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Book;
use App\Classes\Library;
use App\Classes\StudentMember;
use App\Classes\TeacherMember;

// Creating books
$book1 = new Book(
    "Clean Code",
    "Robert C. Martin",
    2
);

$book2 = new Book(
    "The Pragmatic Programmer",
    "Andrew Hunt",
    3
);

// Creating members
$student = new StudentMember("Rahim");
$teacher = new TeacherMember("Lodi");

// Adding books
$library = new Library();
$library->addBook($book1);
$library->showBooks();

// Adding members
$library->addMembers($student);
$library->showMembers();

try {

    // Borrow books
    echo $teacher->borrowBook($book1);

    echo "\nAvailable copies of Clean Code: ";
    echo $book1->getAvailableCopies();

    // Return a book
    echo "\n\n";
    echo $teacher->returnBook($book1);

    echo "\nAvailable copies of Clean Code: ";
    echo $book1->getAvailableCopies();
} catch (\Exception $e) {

    echo "Error: " . $e->getMessage();
}
