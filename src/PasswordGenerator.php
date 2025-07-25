<?php

namespace Escuelait\CustomPasswordGenerator;

use InvalidArgumentException;

class PasswordGenerator {

  private $length;
  private $symbols;

  public const LENGTH = 12;
  public const SYMBOLS = 2;
  public const LETTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  public const NUMBERS = '0123456789';
  public const SYMBOL_CHARS = '!@#$%&*()_+-=[]{}|;:,.<>?';

  public function __construct() {
    $this->length = self::LENGTH;
    $this->symbols = self::SYMBOLS;
  }

  public function generate() {
    $password = [];

    for ($i = 0; $i < $this->symbols; $i++) {
      $password[] = self::SYMBOL_CHARS[random_int(0, strlen(self::SYMBOL_CHARS) - 1)];
    }

    $characters = self::LETTERS . self::NUMBERS;
    $charactersLeft = $this->length - $this->symbols;

    if($charactersLeft < 0) {
      throw new InvalidArgumentException('The number of symbols cannot exceed the total password length');
    }

    for ($i = 0; $i < $charactersLeft; $i++) {
        $password[] = $characters[random_int(0, strlen($characters) - 1)];
    }

    shuffle($password);
    return implode('', $password);
  }

  public function length(int $length) {
    $this->length = $length;
    return $this;
  }

  public function symbols(int $symbols) {
    $this->symbols = $symbols;
    return $this;
  }

}


