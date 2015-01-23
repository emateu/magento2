<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Magento\Framework\Mview\View;

class SubscriptionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Framework\Mview\View\SubscriptionFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $model;

    /**
     * @var \Magento\Framework\ObjectManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $objectManagerMock;

    protected function setUp()
    {
        $this->objectManagerMock = $this->getMock('Magento\Framework\ObjectManagerInterface');
        $this->model = new SubscriptionFactory($this->objectManagerMock);
    }

    public function testCreate()
    {
        $subscriptionInterfaceMock = $this->getMockForAbstractClass(
            'Magento\Framework\Mview\View\SubscriptionInterface', [], '', false
        );
        $this->objectManagerMock->expects($this->once())
            ->method('create')
            ->with('Magento\Framework\Mview\View\SubscriptionInterface', ['some_data'])
            ->will($this->returnValue($subscriptionInterfaceMock));
        $this->assertEquals($subscriptionInterfaceMock, $this->model->create(['some_data']));
    }
}
