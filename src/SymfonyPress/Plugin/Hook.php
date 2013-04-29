<?php
/**
 * Copyright (c) 2013 Josiah Truasheim
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category   Hook
 * @package    SymfonyPress
 * @subpackage Plugin
 * @author     Josiah <josiah@jjs.id.au>
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       https://github.com/SymfonyPress/SymfonyPress
 */

namespace SymfonyPress\Plugin;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Hook
 *
 * Returns the callback for a hook as a service or a method on a service from
 * the container which is lazy loaded when the hook is executed.
 *
 * @category   Hook
 * @package    SymfonyPress
 * @subpackage Plugin
 * @author     Josiah <josiah@jjs.id.au>
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       https://github.com/SymfonyPress/SymfonyPress
 */
class Hook implements HookInterface
{
    /**
     * Hook tag
     * 
     * @var string
     */
    protected $tag;

    /**
     * Hook callback
     * 
     * @var string
     */
    protected $callback;

    /**
     * Hook priority
     * 
     * @var int 
     */
    protected $priority;

    /**
     * Number of accepted arguments
     * 
     * @var int
     */
    protected $acceptedArgs;

    /**
     * Creates the hook
     * 
     * @param string   $tag          Hook tag
     * @param callable $callback     Callback to execute for the hook
     * @param int      $priority     Priority of the hook
     * @param int      $acceptedArgs Number of arguments accepted by the hook
     */
    public function __construct(
        $tag,
        callable $callback,
        $priority = HookInterface::DEFAULT_PRIORITY,
        $acceptedArgs = HookInterface::DEFAULT_ACCEPTED_ARGS
    ) {
        $this->tag = $tag;
        $this->callback = $callback;
        $this->priority = $priority;
        $this->acceptedArgs = $acceptedArgs;
    }

    /**
     * Creates a hook which calls a service at the time of execution
     * 
     * @param string             $tag          Hook tag
     * @param ContainerInterface $container    Container
     * @param string             $id           Service ID
     * @param string             $method       Method to call, null to invoke the service
     * @param int                $priority     Hook priority
     * @param int                $acceptedArgs Number of accepted args
     * 
     * @return Hook
     */
    public static function service(
        $tag,
        ContainerInterface $container,
        $id,
        $method = null,
        $priority = HookInterface::DEFAULT_PRIORITY,
        $acceptedArgs = HookInterface::DEFAULT_ACCEPTED_ARGS
    ) {
        return new self(
            $tag,
            function () use ($container, $id, $method) {
                $args = func_get_args();
                $service = $container->get($id);

                if ($method) {
                    return call_user_func_array([$service, $method], $args);
                } else {
                    return call_user_func_array($service, $args);
                }
            },
            $priority,
            $acceptedArgs
        );
    }

    /**
     * Returns the tag which this hook is attached to
     * 
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Returns the callback for the hook
     * 
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Returns the priority of the hook
     * 
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Returns the number of arguments accepted by the hook callback
     * 
     * @return int
     */
    public function getAcceptedArgs()
    {
        return $this->acceptedArgs;
    }
}