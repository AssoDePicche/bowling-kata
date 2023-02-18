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
    $game = $this->rollSpare();

    $game->roll(3);

    $this->assertEquals(16, $game->score());
  }

  public function test_should_score_twenty_four_for_a_strike_followed_by_a_three_and_four_balls(): void
  {
    $game = $this->rollStrike();

    $game->roll(3);

    $game->roll(4);

    $rest = $this->rollMany(16, 0);

    $this->assertEquals(24, $game->score() + $rest->score());
  }

  public function test_should_score_three_hundred_for_a_perfect_game(): void
  {
    $game = $this->rollMany(12, 10);

    $this->assertEquals(300, $game->score());
  }

  private function rollMany(int $rolls, int $pins): Game
  {
    $game = new Game;

    for ($i = 0; $i < $rolls; $i++) {
      $game->roll($pins);
    }

    return $game;
  }

  private function rollSpare(): Game
  {
    $game = new Game;

    $game->roll(5);

    $game->roll(5);

    return $game;
  }

  private function rollStrike(): Game
  {
    $game = new Game;

    $game->roll(10);

    return $game;
  }
}
