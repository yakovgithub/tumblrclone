<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Domain
	|--------------------------------------------------------------------------
	|
	| Enter your Domain name here
	| eg) 'domain' => 'example.com'
	| 
	| Don't enter it as www.example.com or http://example.com
	|
	*/

	'domain' => 'xstumbl.com',

	'fetch' => PDO::FETCH_CLASS,

	'default' => 'mysql',

	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'admin_xstumbl',
			'username'  => 'xstumbl12',
			'password'  => 'cE[22a9O9dl9',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		)
	),

	'migrations'		=> 'migrations',

	'logo'				=> 'logo.png',				/* Logo should be uploaded in public/assets/images */

	'email'				=> 'help@xstumbl.com',			/* Your email address. This email address will be used while sending email from the application. */

	'fromemail'			=> 'xstumbl Help Desk',			/* Your email name. Please do not use spaces. */
	
	'sendgrid_api_key'	=> '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',

    'registrationmail'  => '<div id="bcnt3610642000004294013" class="mcont" style="padding: 10px; outline: 0px;" onclick="setarr();"><table style="background: #F9F9F9; border-collapse: collapse; line-height: 100% !important; margin: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 0; width: 100% !important;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#f9f9f9"><tbody><tr><td><table style="border-collapse: collapse; margin: auto; max-width: 635px; min-width: 320px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"><tbody><tr><td valign="top"></td></tr><tr><td style="padding: 0 20px;" valign="top"><table style="-webkit-background-clip: padding-box; -webkit-border-radius: 3px; background-clip: padding-box; border-collapse: collapse; border-radius: 3px; color: #545454; font-family: \'helvetica neue\',arial,sans-serif; font-size: 13px; line-height: 20px; margin: 0 auto; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td valign="top"><table style="border: none; border-collapse: separate; font-size: 1px; height: 2px; line-height: 3px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="background: #333333; border: none; font-family: \'helvetica neue\',arial,sans-serif; width: 100%;" valign="top" bgcolor="#333333"></td></tr></tbody></table><table style="-webkit-background-clip: padding-box; -webkit-border-radius: 0 0 3px 3px; background-clip: padding-box; border-collapse: collapse; border-color: #dddddd; border-radius: 0 0 3px 3px; border-style: solid solid none; border-width: 0 1px 1px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="-webkit-background-clip: padding-box; -webkit-border-radius: 0 0 3px 3px; background: white; background-clip: padding-box; border-radius: 0 0 3px 3px; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05); color: #525252; font-family: \'helvetica neue\',arial,sans-serif; font-size: 15px; line-height: 22px; overflow: hidden; padding: 40px 40px 30px;" bgcolor="white"><p style="line-height: 1.5; margin: 0 0 17px; padding-top: 0; text-align: left !important;" align="left"><span style="line-height: 22px;">Hello! <br/><br/>Thanks for signing up! It\'s a pleasure having you on board.<br/></span></p><p style="line-height: 1.5; margin: 0 0 17px; padding-top: 0; text-align: left !important;" align="left"><span style="line-height: 22px;">Please activate your account so you can start using it as soon as possible.<br/>We have already sent you out a second mail (for security purposes) that contains only your activation link. Clicking on it will activate your account.</span></p><p><a href="[[ACTIVATION_LINK]]">[[ACTIVATION_LINK]]</a></p><p>Regards,</p></td></tr></tbody></table></td></tr></tbody></table><div style="display: none; height: 0; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden; width: 0;"><table style="border-collapse: collapse; color: #545454; display: none; font-family: \'helvetica neue\',arial,sans-serif; font-size: 13px; height: 0; line-height: 20px; margin: 0 auto; max-height: 0; max-width: 100%; mso-hide: all; mso-table-lspace: 0pt; mso-table-rspace: 0pt; opacity: 0; overflow: hidden; visibility: hidden; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td style="color: #272727; height: 18px; padding-left: 40px; text-align: left;" align="left" valign="top" width="80"><img style="-ms-interpolation-mode: bicubic; display: inline-block; margin-top: -1px; max-width: 100%; outline: none; text-decoration: none;" src="https://themesic.com/whmcsmail/triangle-8747882e9ef8882f9bc057241fd3c049.png" alt="Triangle" width="40" height="18"/></td></tr></tbody></table></div><div><table style="border-collapse: collapse; margin: 0 auto; max-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td valign="top" width="100%"><img style="max-width: 100%; width: 100%;" src="https://themesic.com/whmcsmail/arrow-37f6774809df6fd083bfc98e9d562e23ca6ede618e2b5e10c042de88d2f858dd.png" alt=""/></td></tr></tbody></table></div><table style="width: 100%;" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td width="75%"><table style="border-collapse: collapse; color: #545454; font-family: \'helvetica neue\',arial,sans-serif; font-size: 13px; line-height: 20px; margin: 0 auto; max-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td width="40"></td><td style="color: #272727;" align="left" valign="middle" width="50"><img style="-ms-interpolation-mode: bicubic; -webkit-background-clip: padding-box; -webkit-border-radius: 20px; background-clip: padding-box; border-radius: 20px; display: inline-block; height: 40px; max-width: 100%; outline: none; text-decoration: none; width: 40px;" src="http://tumblrclone.net/apple-touch-icon-precomposed.png" alt="avatar" width="40" height="40"/></td><td style="color: #999999;"><strong>xstumbl</strong></td></tr></tbody></table></td><td width="25%"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td valign="top" height="20"></td></tr></tbody></table></div>'

);
