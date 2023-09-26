<?php

namespace Staatic\Vendor\Symfony\Component\DependencyInjection\Attribute;

use Attribute;
use ReflectionParameter;
use Staatic\Vendor\Symfony\Component\DependencyInjection\Definition;
use Staatic\Vendor\Symfony\Component\DependencyInjection\Exception\LogicException;
use Staatic\Vendor\Symfony\Component\DependencyInjection\Reference;
#[Attribute(Attribute::TARGET_PARAMETER)]
class AutowireCallable extends Autowire
{
    /**
     * @param string|mixed[] $callable
     * @param bool|string $lazy
     */
    public function __construct($callable = null, string $service = null, string $method = null, $lazy = \false)
    {
        if (!(null !== $callable xor null !== $service)) {
            throw new LogicException('#[AutowireCallable] attribute must declare exactly one of $callable or $service.');
        }
        if (null === $service && null !== $method) {
            throw new LogicException('#[AutowireCallable] attribute cannot have a $method without a $service.');
        }
        parent::__construct($callable ?? [new Reference($service), $method ?? '__invoke'], null, null, null, null, $lazy);
    }
    /**
     * @param mixed $value
     * @param string|null $type
     * @param ReflectionParameter $parameter
     */
    public function buildDefinition($value, $type, $parameter) : Definition
    {
        return (new Definition($type = \is_string($this->lazy) ? $this->lazy : ($type ?: 'Closure')))->setFactory(['Closure', 'fromCallable'])->setArguments([\is_array($value) ? $value + [1 => '__invoke'] : $value])->setLazy($this->lazy || 'Closure' !== $type && 'callable' !== (string) $parameter->getType());
    }
}
