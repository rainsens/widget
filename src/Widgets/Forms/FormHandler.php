<?php
namespace Rainsens\Widget\Widgets\Forms;

class FormHandler
{
	protected $form;
	
	public function __construct($form)
	{
		$this->form = $form;
	}
}
