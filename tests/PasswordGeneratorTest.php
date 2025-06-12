<?php

namespace Tests;

use Escuelait\CustomPasswordGenerator\PasswordGenerator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PasswordGeneratorTest extends TestCase {

  #[Test]
  public function itCreatesDefaultPasswords() {
    $generator = new PasswordGenerator();
    $password = $generator->generate();

    $this->assertIsString($password);
    $this->assertSame(PasswordGenerator::LENGTH, strlen($password));
  }

  #[Test]
  public function itHas2SymbolsInDefaultPassword() {
    $generator = new PasswordGenerator();
    $password = $generator->generate();

    $symbolCount = 0;
    foreach (str_split($password) as $char) {
        if (str_contains(PasswordGenerator::SYMBOL_CHARS, $char)) {
            $symbolCount++;
        }
    }
    $this->assertSame(PasswordGenerator::SYMBOLS, $symbolCount);
  }
}