<?php

/*
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests;

use Guanguans\YiiEvent\PackageSkeleton;

class PackageSkeletonTest extends TestCase
{
    public function testTest()
    {
        $this->assertTrue(PackageSkeleton::test());
    }
}
