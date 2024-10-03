<?php

namespace IBroStudio\DataRepository\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class DataObjectTransformer implements Transformer
{
    public function __construct(protected string $key) {}

    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        return $value->{$this->key};
    }
}
