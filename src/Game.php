<?php

declare(strict_types=1);

namespace App;

final class Game
{
  private int $currentRoll = 0;

  private array $rolls;

  public function __construct()
  {
    $this->rolls = array_fill(0, 21, 0);
  }

  public function roll(int $pins): void
  {
    $this->rolls[$this->currentRoll++] = $pins;
  }

  public function score(): int
  {
    return array_sum($this->rolls);
  }
}
