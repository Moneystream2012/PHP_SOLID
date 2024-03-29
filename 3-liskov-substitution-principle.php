<?php

// Derived class can be substituted at places where base class is used
//
// Liskov Substitution Principle Violation
// The Rectangle - Square problem
class Rectangle
{
    protected $width;
    protected $height;

    public function setWidth($width)
    {
		$this->width = $width;
	}

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

class Square extends Rectangle
{
    public function setWidth($width)
	{
		parent::setWidth($width);
		parent::setHeight($width);
	}

    public function setHeight($height)
    {
        parent::setHeight($height);
        parent::setWidth($height);
    }
}

function calculateRectangleSquare(Rectangle $rectangle, $width, $height)
{
    $rectangle->setWidth($width);
    $rectangle->setHeight($height);
    return $rectangle->getHeight * $rectangle->getWidth;
}

calculateRectangleSquare(new Rectangle, 4, 5); // 20
calculateRectangleSquare(new Square, 4, 5); // 25 ???


// Refactor class Square to solve that problem
// i.e. better will avoid class extending
class Square
{
    protected $size;

    public function setSize($size)
	{
		$this->size = $size;
	}

    public function getSize()
    {
        return $this->size;
    }
}
