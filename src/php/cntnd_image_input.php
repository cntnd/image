?><?php
// cntnd_image_input

// input/vars
$uuid = rand();
$type = "CMS_VALUE[1]";
$fancyboxGroup = "CMS_VALUE[2]";
$fancyboxThumb = (bool) "CMS_VALUE[3]";
$fancyboxPath = "CMS_VALUE[4]";
$additionalClass = "CMS_VALUE[5]";
$hover = (bool) "CMS_VALUE[6]";
$classes = array(
  'top10',
  'top20',
  'top25',
  'top30',
  'top40',
  'top50',
  'top60',
  'top70',
  'top80',
  'top90',
  'top100',
  'top120',
  'top140',
  'top160',
  'top180',
  'top200',
  'top220',
  'top240',
  'top260',
  'top280',
  'top300',
  'top320',
  'top350',
  'top450'
);

// includes
cInclude('module', 'includes/style.cntnd_image_input.php');

?>
<div class="form-vertical">
    <div class="form-check form-check-inline">
        <input id="nothing_<?= $uuid ?>" class="form-check-input" type="radio" name="CMS_VAR[1]" value="false" <?php if(empty($type) OR $type=="false"){ echo 'checked'; } ?> />
        <label for="nothing_<?= $uuid ?>"><?= mi18n("NOTHING") ?></label>
    </div>

    <div class="form-check form-check-inline">
        <input id="link_<?= $uuid ?>" class="form-check-input" type="radio" name="CMS_VAR[1]" value="link" <?php if($type=="link"){ echo 'checked'; } ?> />
        <label for="link_<?= $uuid ?>"><?= mi18n("LINK") ?></label>
    </div>

    <div class="form-check form-check-inline">
        <input id="fancybox_<?= $uuid ?>" class="form-check-input" type="radio" name="CMS_VAR[1]" value="fancybox" <?php if($type=="fancybox"){ echo 'checked'; } ?> />
        <label for="fancybox_<?= $uuid ?>"><?= mi18n("FANCYBOX") ?></label>
    </div>

    <fieldset>
        <legend>Fancybox</legend>

        <div class="form-group">
            <label for="fancybox_group_<?= $uuid ?>"><?= mi18n("FANCYBOX_GROUP") ?></label>
            <input id="fancybox_group_<?= $uuid ?>" name="CMS_VAR[2]" type="text" value="<?= $fancyboxGroup ?>" />
        </div>

        <div class="form-check form-check-inline">
            <input id="fancybox_<?= $uuid ?>" class="form-check-input" type="checkbox" name="CMS_VAR[3]" value="true" <?php if($fancyboxThumb){ echo 'checked'; } ?> />
            <label for="fancybox_<?= $uuid ?>"><?= mi18n("FANCYBOX_THUMB") ?></label>
        </div>

        <div class="form-group">
            <label for="fancybox_path_<?= $uuid ?>"><?= mi18n("FANCYBOX_PATH") ?></label>
            <input id="fancybox_path_<?= $uuid ?>" name="CMS_VAR[4]" type="text" value="<?= $fancyboxPath ?>" />
        </div>
    </fieldset>

    <div class="form-group">
        <label for="additional_class_<?= $uuid ?>"><?= mi18n("ADDITIONAL_CLASS") ?></label>
        <select name="CMS_VAR[5]" id="additional_class_<?= $uuid ?>" size="1">
          <option value="false"><?= mi18n("SELECT_CHOOSE") ?></option>
          <?php
            foreach ($classes as $class) {
              $selected="";
              if ($additionalClass==$class){
                $selected = 'selected="selected"';
              }
              echo '<option '.$selected.' value="'.$class.'">'.$class.'</option>';
            }
          ?>
        </select>
    </div>

    <div class="form-check form-check-inline">
        <input id="hover_<?= $uuid ?>" class="form-check-input" type="checkbox" name="CMS_VAR[6]" value="true" <?php if($hover){ echo 'checked'; } ?> />
        <label for="hover_<?= $uuid ?>"><?= mi18n("HOVER_IMAGE") ?></label>
    </div>
</div>
<?php
