# The Bowling Game Kata

The game consists of 10 frames as shown above. In each frame the player has two opportunities to knock down 10 pins. The score for the frame is the total number of pins knocked down, plus bonuses for strikes and spares.

A spare is when the player knocks down all 10 pins in two tries. The bonus for that frame is the number of pins knocked down by the next roll. So in frame 3 above, the score is 10 (the total number knocked down) plus a bonus of 5 (the number of pins knocked down on the next roll.)

A strike is when the player knocks down all 10 pins on his first try. The bonus for that frame is the value of the next two balls rolled.

In the tenth frame a player who rolls a spare or strike is allowed to roll the extra balls to complete the frame. However no more than three balls can be rolled in tenth frame.

## Project Structure

1. `src:` source code

2. `tests:` automated tests

## Contributing

To contribuit to this project [follow these steps](./CONTRIBUTING).

## Getting started

1. Clone this repository

```bash
git clone git@github.com:AssoDePicche/bowling-kata.git
```

2. Install the dependencies

```bash
composer install
```

## Composer Commands

```bash
composer run tests
```

## Get in touch

Samuel do Prado Rodrigues (AssoDePicche) - samuelprado730@gmail.com
