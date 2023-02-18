<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
  public function test_should_score_zero_for_gutter_game(): void
  {
    $game = $this->rollMany(20, 0);

    $this->assertEquals(0, $game->score());
  }

  public function test_should_score_twenty_for_all_ones_game(): void
  {
    $game = $this->rollMany(20, 1);

    $this->assertEquals(20, $game->score());
  }

  public function test_should_score_sixteen_with_a_spare_followed_by_a_three_ball(): void
  {
    $game = new Game;

    $game->roll(5);

    $game->roll(5);

    $game->roll(3);

    $this->assertEquals(16, $game->score());
  }

  private function rollMany(int $rolls, int $pins): Game
  {
    $game = new Game;

    for ($i = 0; $i < $rolls; $i++) {
      $game->roll($pins);
    }

    return $game;
  }
}
