<?php

namespace Vurpa\Result\Tests;

use PHPUnit\Framework\TestCase;
use Vurpa\Result\Result;

final class ResultTest extends TestCase
{
    public function testSuccessWithNullValueResult()
    {
        $success = Result::ok();

        $this->assertTrue($success->isSuccess());
        $this->assertNull($success->getValue());
    }

    public function testFailureResult()
    {
        $failure = Result::fail('Invalid operation');

        $this->assertTrue($failure->isFailure());
        $this->assertSame('Invalid operation', $failure->getError());
    }

    public function testCombineSuccessAndFailureResults()
    {
        $success = Result::ok();
        $failure = Result::fail('Invalid operation');

        $combined = Result::combine($success, $failure);

        $this->assertTrue($combined->isFailure());
        $this->assertSame('Invalid operation', $combined->getError());
    }
}
