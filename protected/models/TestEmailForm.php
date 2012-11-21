<?php

/**
 * sluzi na odoslanie emailu s testom
 * @author V.Jurenka
 */
class TestEmailForm extends CFormModel
{
	public $subject;
	public $body;
    public $test_id;
    public $list_id;

	public function rules()
	{
		return array(
			array('subject, body, test_id, list_id', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(

		);
	}
}