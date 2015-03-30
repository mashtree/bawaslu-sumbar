<?php
/**
 * @package		VINAORA NIVO SLIDER
 * @subpackage	mod_vt_nivo_slider
 * @copyright	Copyright (C) 2011-2014 VINAORA. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @website		http://vinaora.com
 * @twitter		https://twitter.com/vinaora
 * @facebook	https://facebook.com/vinaora
 * @google+		https://plus.google.com/111142324019789502653
 */

// no direct access
defined('_JEXEC') or die;

// Require the base helper class only once
require_once __DIR__ . '/helper.php';

$module_id	= $module->id;
$params->set('module_id', $module_id);
$helper = new ModVTNivoSliderHelper($params);

// Add the main stylesheet of Nivo Slider to <head> tag
$helper->addNivoCSS();

// Running demo slideshow
$demo = $params->get('demo');
if ($demo != "-1") $params->set('layout', $demo);

// Get Nivo theme and module layout
$theme = $params->get('theme', 'default');
$layout = $params->get('layout', 'default');

// Add the theme stylesheet of Nivo Slider to <head> tag
$helper->addThemCSS($theme, $layout);

// Add jQuery library.
$helper->addJQuery();

// Add Nivo Slider script to <head> tag
$helper->addNivoScript();

// Get basic parameters for Nivo Slider script
$effect				= $params->get('effect');
$slices				= $params->get('slices');
$boxCols			= $params->get('boxCols');
$boxRows			= $params->get('boxRows');

$animSpeed			= (int) $params->get('animSpeed');
$pauseTime			= (int) $params->get('pauseTime');

$startSlide			= (int) $params->get('startSlide');

$directionNav		= $params->get('directionNav');

$controlNav			= $params->get('controlNav');
$controlNavThumbs	= $params->get('controlNavThumbs', 'false');

$pauseOnHover		= $params->get('pauseOnHover');
$manualAdvance		= $params->get('manualAdvance');

$randomStart		= $startSlide ? 'false' : 'true';

$prevText			= htmlspecialchars($params->get('prevText'), ENT_QUOTES);
$nextText			= htmlspecialchars($params->get('nextText'), ENT_QUOTES);

$ribbon				= (int) $params->get('ribbon');

if ($layout == 'default')
{
	$slide_width				= $params->get('slide_width');
	$slide_height				= $params->get('slide_height');
	
	// Get the parameters for 'amazing' theme
	$slide_bgcolor				= $params->get('slide_bgcolor');
	$slide_bdcolor				= $params->get('slide_bdcolor');
	$slide_bdwidth				= $params->get('slide_bdwidth');
	$slide_bdrounded			= $params->get('slide_bdrounded');	
	$slide_bdshadow				= $params->get('slide_bdshadow');

	$controlPosition			= $params->get('controlPosition');
	$controlStyle				= $params->get('controlStyle');
	$arrowStyle					= $params->get('arrowStyle');
	
	$captionPosition			= $params->get('captionPosition');
	$captionMarginVertical		= $params->get('captionMarginVertical');
	$captionMarginHorizontal	= $params->get('captionMarginHorizontal');

	$titleFontStyle				= $params->get('titleFontStyle');
	$titleFontSize				= $params->get('titleFontSize');
	$titleColor					= $params->get('titleColor');

	$descFontSize				= $params->get('descFontSize');
	$descColor					= $params->get('descColor');
	$descFontStyle				= $params->get('descFontStyle');
	
	$captionWidth				= $params->get('captionWidth');
	$captionHeight				= $params->get('captionHeight');
	$captionBackground			= $params->get('captionBackground');
	$captionMargin				= $params->get('captionMargin');
	$captionRounded				= $params->get('captionRounded');
	
	// Create slider
	$startSlide	= $helper->getStartSlide($params);
	$slider		= $helper->getSlider($params);

	// Get the HTML code of images
	$images		= $slider['images'];
	
	// Image not found
	if (empty($images)) $images = JText::_('MOD_VT_NIVO_SLIDER_ERROR_IMAGE_NOT_FOUND');
	
	// Get the HTML code of captions
	$captions	= $slider['captions'];
	
}

$base_url	= JUri::root(true);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_vt_nivo_slider', $params->get('layout', 'default'));
