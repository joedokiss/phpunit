<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testNotificationIsSent()
    {
        $user = new User('dave@example.com');

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $this->assertTrue($user->notify("Hello"));
    }

    public function testReturnsFullName()
    {
        $user = new User('', 'Teresa', 'Green');

        $this->assertEquals('Teresa Green', $user->getFullName());
    }

//    public function testReturnsDecoratedFullName()
//    {
//        $mockUser = $this->getMockBuilder(User::class)
//            ->setConstructorArgs(['', 'Joe', 'Song'])
//            ->setMethods(['addPrefix', 'addSuffix'])
//            ->getMock();
//
//        $mockUser->method('addPrefix')
//            ->willReturn('(MOCKED PREFIX)');
//
//        $mockUser->method('addSuffix')
//            ->willReturn('(MOCKED SUFFIX)');
//
//        $result = $mockUser->addPrefix() . $mockUser->getFullName() . $mockUser->addSuffix();
//
//        $this->assertSame('(MOCKED PREFIX)Joe Song(MOCKED SUFFIX)', $result);
//    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    public function testCannotNotifyUserWithoutEmail()
    {
        $user = new User();

        /**
         * $mockMailer = $this->createMock(Mailer::class);
         *
         * $mockMailer = $this->getMockBuilder(Mailer::class)->getMock();
         *
         * As of this stage, both are equivalent, ALL methods in Mailer class are stubbed which has no content and returns NULL
         */

        /*
         * The alternative solution but it duplicates the original codes in the method
         *
            $mockMailer = $this->createMock(Mailer::class);
            $mockMailer->method('sendMessage')
                ->will($this->throwException(new Exception));
        */

        /**
         * 'setMethods()' is being replaced by 'onlyMethods()'
         * if nothing or null is passed, then no codes are replaced, the original codes will be executed
         */
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify('Hello');
    }
}
