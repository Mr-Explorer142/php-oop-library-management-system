<?php
// Creating books
$book1 = new Book(
    "b001",
    "Clean Code",
    "Robert C. Martin",
    2
);

$book2 = new Book(
    "b002",
    "The Pragmatic Programmer",
    "Andrew Hunt",
    3
);

// Creating members
$student = new StudentMember("s001", "Rahim");
$teacher = new TeacherMember("m001", "Lodi");

// Adding books
$library = new Library();
$library->addBook($book1);
$library->showBooks();

// Adding members
$library->addMembers($student);
$library->showMembers();