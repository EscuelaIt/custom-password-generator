<?php

namespace EscuelaIT\Tests\CustomPasswordGenerator;

use Escuelait\CustomPasswordGenerator\PasswordGenerator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PasswordGeneratorTest extends TestCase {

  protected $generator;

  public function setUp() : void {
    $this->generator = new PasswordGenerator();
  }

  #[Test]
  public function itCreatesDefaultPasswords() {
    $password = $this->generator->generate();

    $this->assertIsString($password);
    $this->assertSame(PasswordGenerator::LENGTH, strlen($password));
  }

  #[Test]
  public function itHas2SymbolsInDefaultPassword() {
    $password = $this->generator->generate();

    $symbolCount = $this->countSymbols($password);
    $this->assertSame(PasswordGenerator::SYMBOLS, $symbolCount);
  }

  #[Test]
  public function itCreatesCustomLength() {
    $password = $this->generator->length(15)->generate();

    $this->assertIsString($password);
    $this->assertSame(15, strlen($password));
  }

  #[Test]
  public function itHasCustomSymbolsPassword() {
    $password = $this->generator->symbols(4)->generate();

    $symbolCount = $this->countSymbols($password);
    $this->assertSame(4, $symbolCount);
  }

  #[Test]
  public function itFailsIfSymbolsExceedLenth() {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('The number of symbols cannot exceed the total password length');
    $this->generator->symbols(10)->length(8)->generate();
  }

  private function countSymbols($password) {
    $symbolCount = 0;
    foreach (str_split($password) as $char) {
        if (str_contains(PasswordGenerator::SYMBOL_CHARS, $char)) {
            $symbolCount++;
        }
    }
    return $symbolCount;
  }

  
}