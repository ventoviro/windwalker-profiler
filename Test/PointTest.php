<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 LYRASOFT Taiwan, Inc.
 * @license    LGPL-2.0-or-later
 */

namespace Windwalker\Profiler\Test;

use Windwalker\Profiler\Point\Point;

/**
 * Test class of Point
 *
 * @since 2.0
 */
class PointTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance.
     *
     * @var Point
     */
    protected $instance;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->instance = new Point('foo');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown(): void
    {
    }

    /**
     * Method to test getName().
     *
     * @return void
     *
     * @covers \Windwalker\Profiler\Point\Point::getName
     */
    public function testGetName()
    {
        $this->assertEquals($this->instance->getName(), 'foo');
    }

    /**
     * Method to test getTime().
     *
     * @return void
     *
     * @covers \Windwalker\Profiler\Point\Point::getTime
     */
    public function testGetTime()
    {
        $profilePoint = new Point('test', 0, 0);

        $this->assertEquals(0, $profilePoint->getTime());

        $profilePoint = new Point('test', 1.5, 0);

        $this->assertEquals(1.5, $profilePoint->getTime());
    }

    /**
     * Method to test getMemory().
     *
     * @return void
     *
     * @covers \Windwalker\Profiler\Point\Point::getMemory
     */
    public function testGetMemory()
    {
        $profilePoint = new Point('test', 0, 0);

        $this->assertEquals(0, $profilePoint->getMemory());

        $profilePoint = new Point('test', 0, 456895);

        $this->assertEquals(456895, $profilePoint->getMemory());
    }
}
