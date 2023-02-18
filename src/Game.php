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
    $score = $index = 0;

    for ($frame = 0; $frame < 10; $frame++) {
      if ($this->rolls[$index] + $this->rolls[$index + 1] === 10) {
        $score += 10 + $this->rolls[$index + 2];
      } else {
        $score += $this->rolls[$index] + $this->rolls[$index + 1];
      }

      $index += 2;
    }

    return $score;
  }
}
