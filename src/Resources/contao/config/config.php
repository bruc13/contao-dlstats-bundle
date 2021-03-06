<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2017 Leo Feyer
 *
 * Module Download Statistics
 *
 * Log file downloads done by the content elements Download and Downloads
 * and show statistics in the backend.
 *
 *
 * Module configuration file.
 *
 * PHP version 5
 * @copyright  Glen Langer 2011..2017 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @package    DLStats
 * @license    LGPL
 * @filesource
 * @see	       https://github.com/BugBuster1701/contao-dlstats-bundle
 */

define('DLSTATS_VERSION', '2.0');
define('DLSTATS_BUILD'  , '1');

/**
 * Defaults, you can overwrite this in Backend -> System -> Settings
 */
$GLOBALS['TL_CONFIG']['dlstatTopDownloads']  = 20;
$GLOBALS['TL_CONFIG']['dlstatLastDownloads'] = 20;

/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 */
$GLOBALS['BE_MOD']['system']['dlstats'] = array
(
        'callback'   => 'Bruc13\DLStats\ModuleDlstatsStatistics',
        'icon'       => 'bundles/bugbusterdlstats/icon.png',
        'stylesheet' => 'bundles/bugbusterdlstats/mod_dlstatsstatistics_be.css',
);

/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 */
$GLOBALS['TL_HOOKS']['parseBackendTemplate'][]  = array('Bruc13\DLStats\DlstatsCheck',     'checkExtensions');
$GLOBALS['TL_HOOKS']['postDownload'][]          = array('Bruc13\DLStats\Dlstats',          'logDownload');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][]     = array('Bruc13\DLStats\ModuleDlstatsTag', 'dlstatsReplaceInsertTags');
