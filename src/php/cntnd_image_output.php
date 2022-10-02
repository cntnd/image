<?php
// cntnd_image_output
$cntnd_module = "cntnd_image";

// assert framework initialization
defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// editmode
$editmode = cRegistry::isBackendEditMode();

// includes
cInclude('module', 'includes/class.cntnd_image.php');
if ($editmode) {
    cInclude('module', 'includes/style.cntnd_image.php');
}

// input/vars
$type = "CMS_VALUE[1]";
$fancybox=false;
$link=false;
if ($type=="fancybox"){
    $fancybox=true;
}
else if ($type=="link") {
    $link=true;
}
$fancyboxGroup = "CMS_VALUE[2]";
$fancyboxThumb = (bool) "CMS_VALUE[3]";
$fancyboxPath = "CMS_VALUE[4]";
$additionalClass = "CMS_VALUE[5]";
if (!$additionalClass || $additionalClass=="false"){
    $additionalClass="";
}
$hover = (bool) "CMS_VALUE[6]";

// image/vars
$imageSource = "CMS_IMG[1]";
$imageDescription = "CMS_IMGDESCR[1]";
if ($editmode) {
    $imageEditor = "CMS_IMGEDITOR[1]";
}
// link/vars
$linkEditor = NULL;
if ($link){
    $linkSource = "CMS_LINK[1]";
    $linkTarget = "CMS_LINKTARGET[1]";
    if ($editmode) {
        $linkEditor = "CMS_LINKEDITOR[1]";
    }
}
// hover/vars
$hoverClass = "";
$hoverImage = CntndImage::hoverImage($imageSource);
if ($hover){
    $hoverClass = "cntnd_image--hover";
    cInclude('module', 'includes/script.cntnd_image_output.php');
}

// module
if ($editmode){
    echo '<span class="module_box"><label class="module_label">'.mi18n("MODULE").'</label></span>';
}

$tpl = cSmartyFrontend::getInstance();
$tpl->assign('editor', $imageEditor);
$tpl->assign('image', CntndImage::image($imageSource, $imageDescription, $fancyboxThumb, $fancyboxPath));

$tpl->assign('fancybox', $fancybox);
$tpl->assign('fancyboxGroup', $fancyboxGroup);

$tpl->assign('additionalClass', $additionalClass);

$tpl->assign('link', $link);
$tpl->assign('linkSource', $linkSource);
$tpl->assign('linkTarget', $linkTarget);
$tpl->assign('linkEditor', $linkEditor);

$tpl->assign('hover', $hover);
$tpl->assign('hoverClass', $hoverClass);
$tpl->assign('hoverImage', $hoverImage);

$tpl->display('default.html');

if ($editmode){
  echo '</div>';
}
?>
