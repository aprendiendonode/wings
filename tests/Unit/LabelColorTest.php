<?php

use Domain\Label\Colors\Red;
use Domain\Label\Colors\Blue;
use Domain\Label\Colors\Gray;
use Domain\Label\Colors\Pink;
use Domain\Label\Colors\Black;
use Domain\Label\Colors\Brown;
use Domain\Label\Colors\Green;
use Domain\Label\Colors\White;
use Domain\Label\Models\Label;
use Domain\Label\Colors\Orange;
use Domain\Label\Colors\Purple;
use Domain\Label\Colors\Yellow;

test('the color codes of a black label is bg-black and text-white', function () {
    $color = new Black(new Label());

    $this->assertEquals('black', $color->getColor());
    $this->assertEquals('bg-black', $color->getBackgroundColor());
    $this->assertEquals('text-white', $color->getForegroundColor());
});

test('the color codes of a blue label is bg-blue-800 and text-blue-100', function () {
    $color = new Blue(new Label());

    $this->assertEquals('blue', $color->getColor());
    $this->assertEquals('bg-blue-800', $color->getBackgroundColor());
    $this->assertEquals('text-blue-100', $color->getForegroundColor());
});

test('the color codes of a brown label is bg-brown-800 and text-brown-100', function () {
    $color = new Brown(new Label());

    $this->assertEquals('brown', $color->getColor());
    $this->assertEquals('bg-brown-800', $color->getBackgroundColor());
    $this->assertEquals('text-brown-100', $color->getForegroundColor());
});

test('the color codes of a gray label is bg-gray-800 and text-gray-100', function () {
    $color = new Gray(new Label());

    $this->assertEquals('gray', $color->getColor());
    $this->assertEquals('bg-gray-800', $color->getBackgroundColor());
    $this->assertEquals('text-gray-100', $color->getForegroundColor());
});

test('the color codes of a green label is bg-green-800 and text-green-100', function () {
    $color = new Green(new Label());

    $this->assertEquals('green', $color->getColor());
    $this->assertEquals('bg-green-800', $color->getBackgroundColor());
    $this->assertEquals('text-green-100', $color->getForegroundColor());
});

test('the color codes of a orange label is bg-orange-800 and text-orange-100', function () {
    $color = new Orange(new Label());

    $this->assertEquals('orange', $color->getColor());
    $this->assertEquals('bg-orange-800', $color->getBackgroundColor());
    $this->assertEquals('text-orange-100', $color->getForegroundColor());
});

test('the color codes of a pink label is bg-pink-800 and text-pink-100', function () {
    $color = new Pink(new Label());

    $this->assertEquals('pink', $color->getColor());
    $this->assertEquals('bg-pink-800', $color->getBackgroundColor());
    $this->assertEquals('text-pink-100', $color->getForegroundColor());
});

test('the color codes of a purple label is bg-purple-800 and text-purple-100', function () {
    $color = new Purple(new Label());

    $this->assertEquals('purple', $color->getColor());
    $this->assertEquals('bg-purple-800', $color->getBackgroundColor());
    $this->assertEquals('text-purple-100', $color->getForegroundColor());
});

test('the color codes of a red label is bg-red-800 and text-red-100', function () {
    $color = new Red(new Label());

    $this->assertEquals('red', $color->getColor());
    $this->assertEquals('bg-red-800', $color->getBackgroundColor());
    $this->assertEquals('text-red-100', $color->getForegroundColor());
});

test('the color codes of a white label is bg-white and text-black', function () {
    $color = new White(new Label());

    $this->assertEquals('white', $color->getColor());
    $this->assertEquals('bg-white', $color->getBackgroundColor());
    $this->assertEquals('text-black', $color->getForegroundColor());
});

test('the color codes of a yellow label is bg-yellow-800 and text-yellow-100', function () {
    $color = new Yellow(new Label());

    $this->assertEquals('yellow', $color->getColor());
    $this->assertEquals('bg-yellow-800', $color->getBackgroundColor());
    $this->assertEquals('text-yellow-100', $color->getForegroundColor());
});
