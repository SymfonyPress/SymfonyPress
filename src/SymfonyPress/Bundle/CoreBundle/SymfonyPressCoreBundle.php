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
 * @category Bundle
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */

namespace SymfonyPress\Bundle\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use SymfonyPress\Plugin\PluginInterface;

/**
 * SymfonyPress Core Bundle
 *
 * This bundle provides the core functional interoperability between WordPress
 * and Symfony.
 *
 * @category Bundle
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */
class SymfonyPressCoreBundle extends Bundle implements PluginInterface
{
    /**
     * Returns the symfonypress core bundle hooks
     * 
     * @return array
     */
    public function getHooks()
    {
        return [
            // new ServiceHook('template_redirect', $this->container, 'symfonypress.404_handler'),
        ];
    }
}