<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
  public function test_should_score_zero_for_gutter_game(): void
  {
    $game = new Game;

    for ($i = 0; $i < 20; $i++) {
      $game->roll(0);
    }

    $this->assertEquals(0, $game->score());
  }

  public function test_should_score_twenty_for_all_ones_game(): void
  {
    $game = new Game;

    for ($i = 0; $i < 20; $i++) {
      $game->roll(1);
    }

    $this->assertEquals(20, $game->score());
  }
}
