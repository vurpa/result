<?php

namespace Vurpa\Result;

/**
 * @template T
 */
class Result
{
    private function __construct(
        private bool $success,
        private ?string $error,
        private mixed $value
    ) {}

    /**
     * @return Result<T>
     */
    public static function fail(string $message)
    {
        return new Result(
            false,
            $message,
            null
        );
    }

    /**
     * @return Result<T>
     */
    public static function ok(mixed $value)
    {
        return new Result(
            true,
            null,
            $value
        );
    }

    /**
     * @return T
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function isFailure(): bool
    {
        return !$this->isSuccess();
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }
}