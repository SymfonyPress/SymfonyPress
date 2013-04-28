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
 * @category ComposerInstaller
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */

namespace SymfonyPress\Composer;

use Composer\Installer\InstallerInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;
use Composer\Installer\LibraryInstaller;

/**
 * SymfonyPress Installer
 *
 * Installs SymfonyPress dependancies in the correct locations.
 *
 * @category ComposerInstaller
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */
class SymfonyPressInstaller extends LibraryInstaller implements InstallerInterface
{
    /**
     * SymfonyPress Wordpress
     *
     * @var string
     */
    const TYPE_WORDPRESS = 'symfonypress-wordpress';

    /**
     * Decides if the SymfonyPress installer supports the package type
     * 
     * @param string $packageType Package type
     * 
     * @return bool
     */
    public function supports($packageType)
    {
        switch ($packageType) {
        case self::TYPE_WORDPRESS:
            return true;

        default:
            return false;
        }
    }

    /**
     * Returns the installation path of a package
     *
     * @param PackageInterface $package Package
     * 
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
        switch ($package->getType()) {
        case self::TYPE_WORDPRESS:
            return 'wp';
        }
    }
}