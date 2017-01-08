<?php
namespace TennisGame1;
class Player
{
    /** @var int  */
    private $score=0;
    /** @var string  */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function incrementScore()
    {
        $this->score++;
    }

    /**
     * @return int
     */
    public function score(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function equals(string $name):bool
    {
        return $this->name == $name;
    }
}