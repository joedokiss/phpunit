<?php
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;

class CommunicationTest extends TestCase
{
    /**
     * @dataProvider communicationProvider
     * @param $times
     * @param $return
     * @param InvocationOrder $expects
     */
    public function testHandleCommunication($times, $return, InvocationOrder $expects)
    {
        $mockCommunicationService = $this->createMock(CommunicationService::class);
        $mockCommunicationService->expects($expects)
            ->method('subscribe');

        $communication = new Communication();
        $communication->setCommunicationService($mockCommunicationService);

        $result = $communication->handleCommunicationSubscribe($times, $return);

        $this->assertSame($result, $return);
    }

    public function communicationProvider()
    {
        return [
            'execute zero' => [
                'times' => 0,
                'return' => 'zero',
                'expects' => $this->never()
            ],
            'execute once'  => [
                'times' => 1,
                'return' => 'once',
                'expects' => $this->once()
            ],
            'execute twice' => [
                'times' => 2,
                'return' => 'twice',
                'expects' => $this->exactly(2)
            ],
            'execute three times' => [
                'times' => 3,
                'return' => 'three',
                'expects' => $this->exactly(3)
            ],
        ];
    }
}