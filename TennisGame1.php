<?php

use TennisGame1\Player;
use TennisGame1\ScoreBoard;
use TennisGame1\ScoreByPointsValues;
use TennisGame1\StatusSetByScoreOfPlayers;

class TennisGame1 implements TennisGame
{
    /** @var Player */
    private $player1;
    /** @var Player */
    private $player2;
    /** @var  string */
    private $player1Name;
    private $player2Name;
    /** @var ScoreBoard */
    private $scoreBoard;

    /**
     * TennisGame1 constructor.
     * @param string $player1Name
     * @param string $player2Name
     */
    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->player1 = new Player($this->player1Name);
        $this->player2 = new Player($this->player2Name);
        $this->scoreBoard = new ScoreBoard($this->player1Name, $this->player2Name);
    }

    /**
     * @param string $playerName
     */
    public function wonPoint($playerName)
    {
        ($this->player1->equals($playerName))
            ? $this->player1->incrementScore()
            : $this->player2->incrementScore();
    }

    public function getScore(): string
    {
        if (StatusSetByScoreOfPlayers::onEquals($this->player1->score(), $this->player2->score())) {
            return $this->scoreBoard->onEquals($this->player1->score());
        }

        if (StatusSetByScoreOfPlayers::onFinal($this->player1->score(), $this->player2->score())) {
            return $this->scoreBoard->onFinal(
                $this->player1->score(),
                $this->player2->score()
            );
        }

        return $this->processSetByPoint();

    }

    /**
     * @return string
     */
    private function processSetByPoint(): string
    {
        $score = $this->scoreBoard->byPoint($this->player1->score());
        $score .= ScoreByPointsValues::SEPARATOR;
        $score .= $this->scoreBoard->byPoint($this->player2->score());
        return $score;
    }
}