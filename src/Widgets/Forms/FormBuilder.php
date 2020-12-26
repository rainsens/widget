<?php
namespace Rainsens\Widget\Widgets\Forms;

class FormBuilder
{
	/**
	 * @var Form
	 */
	protected $form;
	
	protected $title = 'Form Title';
	
	protected $description = 'Form Description';
	
	public function __construct($form)
	{
		$this->form = $form;
	}
	
	public function title(string $title = null)
	{
		if ($title) {
			$this->title = $title;
			return $this->form;
		}
		return $this->title;
	}
	
	public function description(string $description = null)
	{
		if ($description) {
			$this->description = $description;
			return $this->form;
		}
		return $this->description;
	}
	
	public function build()
	{
		return $this->form->view()->render();
	}
}
