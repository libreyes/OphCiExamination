<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

$usedOverallPeriods = array();
if(isset($element->clinic_interval_id)){	$usedOverallPeriods[]=$element->clinic_interval_id;}
if(isset($element->photo_id)){	$usedOverallPeriods[]=$element->photo_id;}
if(isset($element->oct_id)){	$usedOverallPeriods[]=$element->oct_id;}
if(isset($element->hfa_id)){	$usedOverallPeriods[]=$element->hfa_id;}
if(isset($element->hrt_id)){	$usedOverallPeriods[]=$element->hrt_id;}

$overallPeriods = CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_OverallPeriod::model()
	->activeOrPk($usedOverallPeriods)->findAll(
	array('order'=> 'display_order asc')),'id','name'
);

$intervalVisits = CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_VisitInterval::model()
	->activeOrPk(@$element->gonio_id)
	->findAll(array('order'=> 'display_order asc')),'id','name'
);
?>

<div class="element-fields row">
	<?php echo $form->hiddenInput($element, 'eye_id', false, array('class' => 'sideField')); ?>

	<?php echo $form->dropDownList($element, 'clinic_interval_id', $overallPeriods, array( ), false , array('label'=>4, 'field'=>3))?>
	<?php echo $form->dropDownList($element, 'photo_id', $overallPeriods, array(), false , array('label'=>4, 'field'=>3))?>
	<?php echo $form->dropDownList($element, 'oct_id', $overallPeriods, array(), false , array('label'=>4, 'field'=>3))?>
	<?php echo $form->dropDownList($element, 'hfa_id', $overallPeriods, array(), false , array('label'=>4, 'field'=>3))?>
	<?php echo $form->dropDownList($element, 'gonio_id',$intervalVisits,array(),false , array('label'=>4, 'field'=>3)) ?>
	<?php echo $form->dropDownList($element, 'hrt_id', $overallPeriods, array(), false , array('label'=>4, 'field'=>3))?>
	<?php echo $form->textArea($element, 'comments', array('rows' => 6, 'cols' => 80), false, array(), array('label'=>2, 'field'=>7))?>

</div>
<div class="element-fields element-eyes row">
	<div class="element-eye right-eye column left side<?php if (!$element->hasRight()) {?> inactive<?php }?>" data-side="right">
		<div class="active-form">
			<a href="#" class="icon-remove-side remove-side">Remove side</a>
			<div class="row field-row">
				<div class="large-3 column"><label for="<?= CHtml::modelName($element) . '[right_target_iop]' ?>">Target IOP:</label></div>
				<div class="large-3 column"><?= $form->dropDownList($element, 'right_target_iop', array_combine(range(10, 25), range(10, 25)), array('nowrapper' => true, 'empty' => '- Select -')) ?></div>
				<p class="large-1 column end">mmHg</p>
			</div>
		</div>
		<div class="inactive-form">
			<div class="add-side">
				<a href="#">
					Add right side <span class="icon-add-side"></span>
				</a>
			</div>
		</div>
	</div>
	<div class="element-eye left-eye column right side<?php if (!$element->hasLeft()) {?> inactive<?php }?>" data-side="left">
		<div class="active-form">
			<a href="#" class="icon-remove-side remove-side">Remove side</a>
			<div class="row field-row">
				<div class="large-3 column"><label for="<?= CHtml::modelName($element) . '[left_target_iop]' ?>">Target IOP:</label></div>
				<div class="large-3 column"><?= $form->dropDownList($element, 'left_target_iop', array_combine(range(10, 25), range(10, 25)), array('nowrapper' => true, 'empty' => '- Select -')) ?></div>
				<p class="large-1 column end">mmHg</p>
			</div>
		</div>
		<div class="inactive-form">
			<div class="add-side">
				<a href="#">
					Add left side <span class="icon-add-side"></span>
				</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	if (typeof setCurrentManagementIOP == 'function') {
		setCurrentManagementIOP('left');
		setCurrentManagementIOP('right');
	}
</script>
<?php
	Yii::app()->clientScript->registerScriptFile("{$this->assetPath}/js/OverallManagement.js", CClientScript::POS_HEAD);
?>

