<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Core / Form
 */
namespace PH7;

use PH7\Framework\Mvc\Request\Http;

class ShareUrlCoreForm
{
    /**
     * @param $sUrl The URL to share. If you enter nothing, it will be the current URL.
     * @param integer $iWidth Width of the form in pixel.
     * @param boolean $bIsShareUrlLabel If TURE, it shows 'Share URL:' label beside the field.
     * @return void
     */
    public static function display($sUrl = null, $iWidth = null, $bIsShareUrlLabel = true)
    {
        $sUrl = !empty($sUrl) ? $sUrl : (new Http)->currentUrl();
        $sLabel = $bIsShareUrlLabel ? t('Share URL:') : '';

        $oForm = new \PFBC\Form('form_share_url', $iWidth);
        $oForm->configure(array('class' => 'center'));
        $oForm->addElement(new \PFBC\Element\Url($sLabel, 'share', array('value'=>$sUrl, 'readonly'=>'readonly', 'onclick'=>'this.select()')));
        $oForm->addElement(new \PFBC\Element\HTMLExternal('<br />'));
        $oForm->render();
    }
}
