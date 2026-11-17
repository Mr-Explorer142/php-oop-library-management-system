# php-oop-library-management-system

A simple **Library Management System** built with raw PHP, designed as a hands-on project to **revise and practice Object-Oriented Programming (OOP) concepts in PHP**. It models a real-world library workflow — books, members, borrowing, and returning — while demonstrating modern PHP OOP practices in a clean, PSR-4 structured codebase.

## Features

- Add books and members to the library
- Display all registered books and members with their details
- Members can borrow books (with role-based borrowing limits)
- Members can return borrowed books
- Automatic tracking of available copies per book
- Unique auto-generated IDs for books and members
- Graceful error handling for invalid operations (e.g., borrowing beyond limits, returning a book not borrowed)

## PHP OOP Concepts Covered

| # | Concept | Where It Is Used |
|---|---------|------------------|
| 1 | **Classes & Objects** | `Book`, `Library`, `Member` classes instantiated in `index.php` |
| 2 | **Properties & Methods** | Encapsulated state (`$title`, `$availableCopies`, `$books`, `$members`) with behavior methods |
| 3 | **Constructors** | `__construct()` in `Book`, `Member`, and subclasses with constructor promotion |
| 4 | **Encapsulation (Access Modifiers)** | `private` and `protected` properties with `public` getter methods |
| 5 | **Inheritance** | `StudentMember` and `TeacherMember` extend the abstract `Member` class via `parent::__construct()` |
| 6 | **Abstract Classes** | `Member` is declared `abstract` and cannot be instantiated directly |
| 7 | **Interfaces** | `Borrowable` interface defines the `borrowBook()` / `returnBook()` contract, implemented by member classes |
| 8 | **Traits** | `UniqueIdGenerator` trait reused by both `Book` and `Member` for code reuse without inheritance |
| 9 | **Polymorphism** | Different member types share the same `Borrowable` contract while enforcing different borrowing limits (3 for students, 10 for teachers) |
| 10 | **Type Hinting & Strict Types** | Scalar type declarations and return types (`string`, `int`, `bool`, `void`) on all methods |
| 11 | **Static Typing (Typed Properties)** | Typed class properties (e.g., `private string $id; private array $books = [];`) |
| 12 | **Exception Handling** | Throwing `\InvalidArgumentException` / `\Exception` and catching them with `try...catch` in `index.php` |
| 13 | **Namespaces & Autoloading** | `App\Classes`, `App\Interfaces`, `App\Traits` namespaces with Composer PSR-4 autoloading |
| 14 | **`$this` & Object References** | Objects passed by reference across classes (`Library` holds `Book`/`Member` instances) |
| 15 | **Composition & Aggregation** | `Library` aggregates `Book` and `Member` objects; members hold collections of borrowed books |

## Project Structure

```
├── index.php                  # Application entry point / demo usage
├── composer.json              # PSR-4 autoloading configuration
├── tempCodeRunnerFile.php     # VS Code runner scratch file
└── src/
    ├── Classes/
    │   ├── Book.php           # Book entity (id, title, author, available copies)
    │   ├── Library.php        # Manages collections of books and members
    │   ├── Member.php         # Abstract member base class
    │   ├── StudentMember.php  # Student member (max 3 books)
    │   └── TeacherMember.php  # Teacher member (max 10 books)
    ├── Interfaces/
    │   └── Borrowable.php     # Borrow/return contract
    ├── Traits/
    │   └── UniqueIdGenerator.php  # Generates prefixed unique IDs
    └── Helpers/
        └── Logger.php         # Static logging helper
```

## Getting Started

### Requirements

- PHP 7.4+ (PHP 8+ recommended for constructor property promotion and typed properties)
- Composer

### Installation

```bash
git clone <repository-url>
cd php-oop-library-management-system
composer install
```

### Usage

Run the demo application:

```bash
php index.php
```

### Example Output

```
ID: B-67f3a2c1e8f9
Title: Clean Code
Author: Robert C. Martin
Available Copies: 2
----------------------
...
Lodi borrowed Clean Code

Available copies of Clean Code: 1
Lodi returned Clean Code

Available copies of Clean Code: 2
```

## Key Implementation Highlights

- **`Book`** — Fully encapsulated entity with validation in the constructor (rejects negative copies) and guard clauses in `borrowCopy()` / `returnCopy()`.
- **`Member` (abstract) + `Borrowable` (interface)** — Demonstrates combining abstraction and interface-based contracts for members.
- **`StudentMember` / `TeacherMember`** — Show polymorphism in action: identical contracts, different business rules (borrowing limits).
- **`Library`** — Acts as the central manager class, demonstrating aggregation of multiple object types.
- **`UniqueIdGenerator` (trait)** — Shows horizontal code reuse, shared by both `Book` and `Member`.
- **`index.php`** — Entry point demonstrating object wiring, method chaining of real-world flows, and `try...catch` error handling.

## Purpose

This project is intentionally kept framework-free and database-free so the focus stays on **core PHP OOP fundamentals**. It serves as a reference playground for revising concepts like inheritance hierarchies, interfaces vs. abstract classes, traits, encapsulation, and exception handling — all applied to a familiar, real-world domain.
