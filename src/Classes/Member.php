<?php

namespace App\Classes;

use App\Interfaces\Borrowable;
use App\Traits\UniqueIdGenerator;

abstract class Member implements Borrowable
{
    protected string $id;
    protected string $memberName;

    use UniqueIdGenerator;

    public function __construct(string $memberName)
    {
        $this->id = $this->generateId("M-");
        $this->memberName = $memberName;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMemberName(): string
    {
        return $this->memberName;
    }
}
