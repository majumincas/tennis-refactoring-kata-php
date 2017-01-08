<?php
namespace TennisGame1;
class StatusSetByScoreOfPlayers
{
    /**
     * @param int $scorePlayerOne
     * @param int $scorePlayerTwo
     * @return bool
     */
    static function onEquals(int $scorePlayerOne,int $scorePlayerTwo):bool
    {
        return ($scorePlayerOne == $scorePlayerTwo);
    }

    /**
     * @param int $scorePlayerOne
     * @param int $scorePlayerTwo
     * @return bool
     */
    static function onFinal(int $scorePlayerOne,int $scorePlayerTwo): bool
    {
        return  ($scorePlayerOne >= PointsSetValues::POINT_FOUR || $scorePlayerTwo >= PointsSetValues::POINT_FOUR);
    }
}