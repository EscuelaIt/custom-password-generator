<?php

namespace Escuelait\CustomPasswordGenerator;

class PasswordGenerator {

  private $length = 10;
  private $symbols = 2;
  private string $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  private string $numbers = '0123456789';
  private string $symbolChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

  public function generate() {
    $password = [];

    for ($i = 0; $i < $this->symbols; $i++) {
      $password[] = $this->symbolChars[random_int(0, strlen($this->symbolChars) - 1)];
    }

    $characters = $this->letters . $this->numbers;
    $charactersLeft = $this->length - $this->symbols;
    for ($i = 0; $i < $charactersLeft; $i++) {
        $password[] = $characters[random_int(0, strlen($characters) - 1)];
    }

    shuffle($password);
    return implode('', $password);
  }
  
}