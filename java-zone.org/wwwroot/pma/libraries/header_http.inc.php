<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 *
 * @package PhpMyAdmin
 */
if (! defined('PHPMYADMIN')) {
    exit;
}

/**
 *
 */
if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) {
    die(__("GLOBALS overwrite attempt"));
}

/**
 * Sends http headers
 */
$GLOBALS['now'] = gmdate('D, d M Y H:i:s') . ' GMT';
/* Prevent against ClickJacking by allowing frames only from same origin */
if (!$GLOBALS['cfg']['AllowThirdPartyFraming']) {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Security-Policy: allow \'self\'; options inline-script eval-script; frame-ancestors \'self\'; img-src \'self\' data:; script-src \'self\' http://www.phpmyadmin.net');
    header('X-WebKit-CSP: default-src \'self\' \'unsafe-inline\'; img-src \'self\' data:; script-src \'self\' \'unsafe-inline\' \'unsafe-eval\' http://www.phpmyadmin.net');
}
PMA_no_cache_header();
if (!defined('IS_TRANSFORMATION_WRAPPER')) {
    // Define the charset to be used
    header('Content-Type: text/html; charset=utf-8');
}
?>
