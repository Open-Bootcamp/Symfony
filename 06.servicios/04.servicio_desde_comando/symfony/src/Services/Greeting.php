<?php
// src/Services/Greeting.php
namespace App\Services;

class Greeting
{
  public function greet(string $name): string
  {
    return "Hello $name";
  }
}