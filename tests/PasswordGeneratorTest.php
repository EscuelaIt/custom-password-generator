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
    $this->assertSame(10, strlen($password));
  }
}