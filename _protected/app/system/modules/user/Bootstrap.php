<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / User
 */
namespace PH7;

defined('PH7') or die('Restricted access');

use PH7\Framework\Registry\Registry;
use PH7\Framework\Session\Session;
use PH7\Framework\Cookie\Cookie;
use PH7\Framework\Security\Security;
use PH7\Framework\Mvc\Model\Security as SecurityModel;

// Automatic connection
if (!UserCore::auth() && Registry::getInstance()->action !== 'soon') {
    $oCookie = new Cookie;
    if ($oCookie->exists(array('member_remember', 'member_id'))) {
        if ((new ExistsCoreModel)->id($oCookie->get('member_id'))) {
            $oUserModel = new UserCoreModel;
            $oUser = $oUserModel->readProfile($oCookie->get('member_id'));
            if ($oCookie->get('member_remember') === Security::hashCookie($oUser->password)) {
                (new UserCore)->setAuth($oUser, $oUserModel, new Session, new SecurityModel);
            }
        }
    }
    unset($oCookie);
}
