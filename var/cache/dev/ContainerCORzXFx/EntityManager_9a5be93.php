<?php

namespace ContainerCORzXFx;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder1fc35 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer80527 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1d649 = [
        
    ];

    public function getConnection()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getConnection', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getMetadataFactory', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getExpressionBuilder', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'beginTransaction', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getCache', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getCache();
    }

    public function transactional($func)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'transactional', array('func' => $func), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'wrapInTransaction', array('func' => $func), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'commit', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->commit();
    }

    public function rollback()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'rollback', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getClassMetadata', array('className' => $className), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'createQuery', array('dql' => $dql), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'createNamedQuery', array('name' => $name), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'createQueryBuilder', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'flush', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'clear', array('entityName' => $entityName), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->clear($entityName);
    }

    public function close()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'close', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->close();
    }

    public function persist($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'persist', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'remove', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'refresh', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'detach', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'merge', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getRepository', array('entityName' => $entityName), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'contains', array('entity' => $entity), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getEventManager', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getConfiguration', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'isOpen', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getUnitOfWork', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getProxyFactory', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'initializeObject', array('obj' => $obj), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'getFilters', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'isFiltersStateClean', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'hasFilters', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return $this->valueHolder1fc35->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer80527 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder1fc35) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder1fc35 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder1fc35->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__get', ['name' => $name], $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        if (isset(self::$publicProperties1d649[$name])) {
            return $this->valueHolder1fc35->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1fc35;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder1fc35;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1fc35;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder1fc35;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__isset', array('name' => $name), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1fc35;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder1fc35;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__unset', array('name' => $name), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1fc35;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder1fc35;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__clone', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        $this->valueHolder1fc35 = clone $this->valueHolder1fc35;
    }

    public function __sleep()
    {
        $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, '__sleep', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;

        return array('valueHolder1fc35');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer80527 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer80527;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer80527 && ($this->initializer80527->__invoke($valueHolder1fc35, $this, 'initializeProxy', array(), $this->initializer80527) || 1) && $this->valueHolder1fc35 = $valueHolder1fc35;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder1fc35;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder1fc35;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
