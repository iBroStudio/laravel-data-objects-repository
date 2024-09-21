<?php

use IBroStudio\DataRepository\ValueObjects\SemanticVersion;
use IBroStudio\DataRepository\ValueObjects\VersionedComposerJson;
use Illuminate\Validation\ValidationException;

it('can instantiate', function () {
    expect(
        VersionedComposerJson::make(__DIR__.'/../Support/composer.json')
    )->toBeInstanceOf(VersionedComposerJson::class);
});

it('throws exception when empty value', function () {
    VersionedComposerJson::make('');
})->throws(ValidationException::class, 'No file provided');

it('throws exception when file does not exist', function () {
    VersionedComposerJson::make('does_not_exist.json');
})->throws(ValidationException::class, 'File not found: does_not_exist.json');

it('can give composer.json version', function () {
    expect(
        VersionedComposerJson::make(__DIR__.'/../Support/composer.json')->version()
    )->toBeInstanceOf(SemanticVersion::class);
});

it('can update composer.json version', function () {
    $version = SemanticVersion::make(fake()->semver());
    expect(
        VersionedComposerJson::make(__DIR__.'/../Support/composer.json')->version($version)
    )->toEqual($version);
});
