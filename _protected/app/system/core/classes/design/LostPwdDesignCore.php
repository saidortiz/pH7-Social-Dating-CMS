<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Core / Class / Design
 */
namespace PH7;

use PH7\Framework\Pattern\Statik, PH7\Framework\Mvc\Router\Uri;

class LostPwdDesignCore
{
    /**
     * Import the trait to set the class static.
     * The trait sets constructor/clone private to prevent instantiation.
     */
    use Statik;

    /**
     * Get the "forgot password" link.
     *
     * @param string $sMod
     * @param boolean $bPrint Print or Return the HTML code. Default TRUE
     * @return void
     */
    public static function link($sMod, $bPrint = true)
    {
        $sHtml = '<a rel="nofollow" href="' . Uri::get('lost-password','main','forgot',$sMod) . '">' . t('Forgot your password?') . '</a>';

        if ($bPrint)
            echo $sHtml;
        else
            return $sHtml;
    }
}
