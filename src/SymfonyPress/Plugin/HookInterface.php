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

/**
 * Plugin Hook
 *
 * @category   Hook
 * @package    SymfonyPress
 * @subpackage Plugin
 * @author     Josiah <josiah@jjs.id.au>
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       https://github.com/SymfonyPress/SymfonyPress
 */
interface HookInterface
{
    /**
     * Default priority
     *
     * @var int
     */
    const DEFAULT_PRIORITY = 10;

    /**
     * Default number of accepted arguments
     *
     * @var int
     */
    const DEFAULT_ACCEPTED_ARGS = 1;

    /**
     * Returns the tag which this hook is attached to
     * 
     * @return string
     */
    public function getTag();

    /**
     * Returns the callback for the hook
     * 
     * @return callable
     */
    public function getCallback();

    /**
     * Returns the priority of the hook
     * 
     * @return int
     */
    public function getPriority();

    /**
     * Returns the number of arguments accepted by the hook callback
     * 
     * @return int
     */
    public function getAcceptedArgs();
}