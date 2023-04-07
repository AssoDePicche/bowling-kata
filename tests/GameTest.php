<?php

declare(strict_types=1);

namespace Test;

use Game;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
  private Game $game;

  public function setUp(): void
  {
    $this->game = new Game;
  }

  public function test_should_score_zero_for_gutter_game(): void
  {
    $this->rollMany(20, 0);

    $this->assertEquals(0, $this->game->score());
  }

  public function test_should_score_twenty_for_all_ones_game(): void
  {
    $this->rollMany(20, 1);

    $this->assertEquals(20, $this->game->score());
  }

  public function test_should_score_sixteen_with_a_spare_followed_by_a_three_ball(): void
  {
    $this->rollSpare();

    $this->game->roll(3);

    $this->assertEquals(16, $this->game->score());
  }

  public function test_should_score_twenty_four_for_a_strike_followed_by_a_three_and_four_balls(): void
  {
    $this->rollStrike();

    $this->game->roll(3);

    $this->game->roll(4);

    $this->rollMany(16, 0);

    $this->assertEquals(24, $this->game->score());
  }

  public function test_should_score_three_hundred_for_a_perfect_game(): void
  {
    $this->rollMany(12, 10);

    $this->assertEquals(300, $this->game->score());
  }

  private function rollMany(int $rolls, int $pins): void
  {
    for ($i = 0; $i < $rolls; $i++) {
      $this->game->roll($pins);
    }
  }

  private function rollSpare(): void
  {
    $this->game->roll(5);

    $this->game->roll(5);
  }

  private function rollStrike(): void
  {
    $this->game->roll(10);
  }
}
