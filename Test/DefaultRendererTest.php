<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 LYRASOFT Taiwan, Inc.
 * @license    LGPL-2.0-or-later
 */

namespace Windwalker\Profiler\Test;

use Windwalker\Profiler\Point\Point;
use Windwalker\Profiler\Profiler;
use Windwalker\Profiler\Renderer\DefaultRenderer;

/**
 * Test class of DefaultRenderer
 *
 * @since 2.0
 */
class DefaultRendererTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance.
     *
     * @var DefaultRenderer
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
        $this->instance = new DefaultRenderer();
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
     * Method to test render().
     *
     * @return void
     *
     * @covers \Windwalker\Profiler\Renderer\DefaultRenderer::render
     */
    public function testRender()
    {
        // Create a few points.
        $first = new Point('first');
        $second = new Point('second', 1.5, 1048576);
        $third = new Point('third', 2.5, 2097152);
        $fourth = new Point('fourth', 3, 1572864);

        // Create a profiler and inject the points.
        $profiler = new Profiler('test', null, [$first, $second, $third, $fourth]);

        $expectedString = [];

        $expectedString[] = 'test 0.000 seconds (+0.000); 0.00 MB (0.000) - first';
        $expectedString[] = 'test 1.500 seconds (+1.500); 1.00 MB (+1.000) - second';
        $expectedString[] = 'test 2.500 seconds (+1.000); 2.00 MB (+1.000) - third';
        $expectedString[] = 'test 3.000 seconds (+0.500); 1.50 MB (-0.500) - fourth';

        $this->assertEquals(implode("\n", $expectedString), $this->instance->render($profiler));
    }
}
