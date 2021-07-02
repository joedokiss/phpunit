<?php


class Math
{
    protected $mathService;

    public function __construct(MathService $mathService)
    {
        $this->mathService = $mathService;
    }

    /**
     * @return MathService
     */
    public function getMathService(): MathService
    {
        return $this->mathService;
    }

    /**
     * @param MathService $mathService
     */
    public function setMathService(MathService $mathService): void
    {
        $this->mathService = $mathService;
    }

    public function getAverage($numOne, $numTwo)
    {
        return $this->mathService->computeAverage($numOne, $numTwo);
    }
}