<?php


class MathService
{
    protected $result;

    public function computeAverage($numOne, $numTwo)
    {
        $result = ($numOne + $numTwo) / 2;

        $this->accumulateTotal($result);

        return $result;
    }

    public function accumulateTotal($result)
    {
        $this->result += $result;

        return $this->result;
    }

    public function getResult()
    {
        return $this->result;
    }
}