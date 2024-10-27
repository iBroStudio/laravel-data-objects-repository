<?php

namespace IBroStudio\DataRepository\ValueObjects\Units\Byte;

use ByteUnits\Metric;
use IBroStudio\DataRepository\Contracts\UnitValueContract;

class ExaByteUnit extends ByteUnit implements UnitValueContract
{
    public static function make(mixed ...$values): static
    {
        return new static(
            Metric::exabytes($values[0])
        );
    }

    public static function unit(): ?string
    {
        return 'EB';
    }
}
