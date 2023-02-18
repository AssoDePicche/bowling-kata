<?php

declare(strict_types=1);

namespace App;

final class Game implements GameInterface
{
  public function roll(int $pins): void
  {
  }

  public function score(): int
  {
    return 0;
  }
}
