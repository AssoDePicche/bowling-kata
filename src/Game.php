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
    $score = $frameIndex = 0;

    for ($frame = 0; $frame < 10; $frame++) {
      if ($this->rolls[$frameIndex] === 10) {
        $score += 10 + $this->strikeBonus($frameIndex);

        $frameIndex++;
      } else if ($this->isSpare($frameIndex)) {
        $score += 10 + $this->spareBonus($frameIndex);

        $frameIndex += 2;
      } else {
        $score += $this->sumOfBallsInFrame($frameIndex);

        $frameIndex += 2;
      }
    }

    return $score;
  }

  private function strikeBonus(int $frameIndex): int
  {
    return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
  }

  private function spareBonus(int $frameIndex): int
  {
    return $this->rolls[$frameIndex + 2];
  }

  private function isSpare(int $frameIndex): bool
  {
    return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
  }

  private function sumOfBallsInFrame(int $frameIndex): int
  {
    return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
  }
}
