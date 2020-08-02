<?php
// cntnd_navigation_output

// assert framework initialization
defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// editmode
$editmode = cRegistry::isBackendEditMode();

// input/vars
$fancybox = (bool) "CMS_VALUE[1]";
$fancyboxGroup = "CMS_VALUE[2]";
$fancyboxThumb = (bool) "CMS_VALUE[3]";
$fancyboxPath = "CMS_VALUE[4]";
$additionalClass = "CMS_VALUE[5]";
if (!$additionalClass || $additionalClass=="false"){
    $additionalClass="";
}

// image/vars
$imageSource = "CMS_IMG[1]";
$imageDescription = "CMS_IMGDESCR[1]";
if ($editmode) {
    $imageEditor = "CMS_IMGEDITOR[1]";
}

// includes
cInclude('module', 'includes/class.cntnd_image.php');

// module
if ($editmode){
	echo '<div class="content_box"><label class="content_type_label">'.mi18n("MODULE").'</label>';
}

$tpl = cSmartyFrontend::getInstance();
$tpl->assign('editor', $imageEditor);
$tpl->assign('image', CntndImage::image($imageSource, $imageDescription, $fancyboxThumb, $fancyboxPath));

$tpl->assign('fancybox', $fancybox);
$tpl->assign('fancyboxGroup', $fancyboxGroup);

$tpl->assign('additionalClass', $additionalClass);

$tpl->display('default.html');

if ($editmode){
  echo '</div>';
}
?>
