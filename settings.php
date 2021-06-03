<?php
if($ADMIN->fulltree){

	$settings->add(new admin_setting_configcheckbox('block_quescolorsetting/stusubmittype',
		get_string('stusubmittype','block_quescolorsetting'),
		get_string('stusubmittype','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/notcompletecolor',
	get_string('notcompletecolor','block_quescolorsetting'),
	get_string('notcompletecolordesc','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/completecolor',
	get_string('completecolor','block_quescolorsetting'),
	get_string('completecolordesc','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/needcorrection',
	get_string('needcorrection','block_quescolorsetting'),
	get_string('needcorrectiondesc','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/passedtoiqa',
	get_string('passedtoiqa','block_quescolorsetting'),
	get_string('passedtoiqadesc','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/needcorrectioniqa',
	get_string('needcorrectioniqa','block_quescolorsetting'),
	get_string('needcorrectioniqadesc','block_quescolorsetting'), 
		0));

	$settings->add(new admin_setting_configcolourpicker('block_quescolorsetting/iqaagreeonpass',
	get_string('iqaagreeonpass','block_quescolorsetting'),
	get_string('iqaagreeonpassdesc','block_quescolorsetting'), 
		0));
	
}