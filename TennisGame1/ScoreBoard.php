<?php
namespace TennisGame1;
class ScoreBoard
{
    /**
     * @var string
     */
    private $player1Name;
    /**
     * @var string
     */
    private $player2Name;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    /**
     * @param int $point
     * @return string
     */
    public function separatorByPoint(int $point)
    {
        return ($point != PointsSetValues::POINT_ONE)
            ? ScoreByPointsValues::SEPARATOR
            : ScoreByPointsValues::WORLD_EMPTY;
    }

    /**
     * @param int $score
     * @return string
     */
    public function onEquals(int $score): string
    {
        switch ($score) {
            case 0:
                return ScoreByPointsValues::SCORE_BY_POINT_LOVE.$this->addAll();
            case 1:
                return ScoreByPointsValues::SCORE_BY_POINT_FIFTEEN.$this->addAll();
            case 2:
                return ScoreByPointsValues::SCORE_BY_POINT_THIRTY.$this->addAll();
            default:
                return ScoreByPointsValues::WORD_DEUCE;
        }
    }

    /**
     * @return string
     */
    private function addAll(): string
    {
        return ScoreByPointsValues::SEPARATOR.ScoreByPointsValues::WORD_ALL;
    }


    /**
     * @param int $scorePlayerOne
     * @param int $scorePlayerTwo
     * @return string
     */
    public function onFinal(int $scorePlayerOne, int $scorePlayerTwo): string
    {
        $minusResult = $scorePlayerOne - $scorePlayerTwo;
        if ($minusResult == 1) {
            return ScoreByPointsValues::WORD_ADVANTAGE.$this->player1Name;
        } elseif ($minusResult == -1) {
            return ScoreByPointsValues::WORD_ADVANTAGE.$this->player2Name;
        } elseif ($minusResult >= 2) {
            return ScoreByPointsValues::WORLD_WIN.$this->player1Name;
        } else {
            return ScoreByPointsValues::WORLD_WIN.$this->player2Name;
        }
    }

    /**
     * @param int $point
     * @return string
     */
    public function byPoint(int $point): string
    {
        switch ($point) {
            case PointsSetValues::POINT_ZERO:
                return ScoreByPointsValues::SCORE_BY_POINT_LOVE;
            case PointsSetValues::POINT_ONE:
                return  ScoreByPointsValues::SCORE_BY_POINT_FIFTEEN;
            case PointsSetValues::POINT_TWO:
                return  ScoreByPointsValues::SCORE_BY_POINT_THIRTY;
            case PointsSetValues::POINT_THREE:
                return  ScoreByPointsValues::SCORE_BY_POINT_FORTY;
        }
    }

}