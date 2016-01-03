<?php
/**
 * Created 04/01/16 03:01
 *
 * @copyright (c) 2016, skews-bundles
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ras\Bundle\FlashAlertBundle\Model;

/**
 * Class AlertReporterInterface
 *
 * @author Rasanga Perera <rasanga@byng-systems.com>
 */
interface AlertReporterInterface
{
    /**
     * Adds error alert to session flash bag
     *
     * @param string $message
     */
    public function addError($message);

    /**
     * Adds success alert to session flash bag
     *
     * @param string $message
     */
    public function addSuccess($message);

    /**
     * Adds information alert to session flash bag
     *
     * @param string $message
     */
    public function addInfo($message);

    /**
     * Adds warning (block) alert to session flash bag
     *
     * @param string $message
     */
    public function addWarning($message);
}