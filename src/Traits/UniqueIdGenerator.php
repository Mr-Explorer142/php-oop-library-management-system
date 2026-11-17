<?php

namespace App\Traits;

trait UniqueIdGenerator
{

    public function generateId(string $prefix): string
    {
        return $prefix . uniqid();
    }
}
