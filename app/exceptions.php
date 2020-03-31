<?php declare(strict_types = 1);

namespace App;


class NotSupportedException extends \LogicException
{

}


class NotImplementedException extends \LogicException
{

}


class ImplementationException extends \LogicException
{

}


class InvalidArgumentException extends ImplementationException
{

}

