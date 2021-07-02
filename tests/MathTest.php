<?php

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testGetAverageCanReturnExpectedResults()
    {
        $mathServiceMock = $this->createMock(MathService::class);
        $mathServiceMock->expects($this->exactly(3))
            ->method('computeAverage')
            ->withConsecutive([1, 3], [3, 5], [4, 6])
            ->willReturnOnConsecutiveCalls(20, 4, 5);

        $math = new Math($mathServiceMock);

        $this->assertSame(20, $math->getAverage(1,3));
        $math->getAverage(3, 5);
        $math->getAverage(4, 6);
    }

    public function testSomething()
    {
        //生成一个仿件
        $mock = $this->getMockBuilder(Observer::class)
            ->setMethods(['doSomething'])
            ->getMock();

        //预期管理：doSomething 方法会被执行2次
        //第一次：参数1：必须是字符串：“Hi”；参数2：值必须大于等于2；
        //第二次：参数1：可以为任意数据；参数2：必须是布尔true
        $mock->expects($this->exactly(3))
            ->method('doSomething')
            ->withConsecutive(
                [
                    $this->equalTo('Hi'), $this->greaterThanOrEqual(2)
                ],
                [
                    $this->anything(), $this->isTrue()
                ],
                [
                    $this->stringContains('test'), $this->callback(function (int $arg) {
                        return $arg % 2 === 0;
                    })
                ]
            );

        $mock->doSomething('Hi', 3);
        $mock->doSomething('Any', true);
        $mock->doSomething('phpunit-test', 5);//预期失败，不是偶数，回调会返回false}
    }
}