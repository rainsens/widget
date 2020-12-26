<?php
namespace Rainsens\Widget\Widgets\Forms;

class FormControl
{
	protected $form;
	
	const MODE_CREATING = 'creating';
	const MODE_EDITING = 'editing';
	
	protected $mode = '';
	
	protected $action = '';
	
	protected $method = '';
	
	public function __construct($form)
	{
		$this->form = $form;
		$this->mode(self::MODE_CREATING);
	}
	
	public function mode(string $mode = null)
	{
		if ($mode) {
			$this->mode = $mode;
			$this->method = $mode === self::MODE_CREATING ? 'POST' : 'PUT';
		}
		return $this->mode;
	}
	
	public function isMode(string $mode)
	{
		return $this->mode === $mode;
	}
	
	public function isCreatingMode()
	{
		return $this->isMode(self::MODE_CREATING);
	}
	
	public function isEditingMode()
	{
		return $this->isMode(self::MODE_EDITING);
	}
	
	public function action(string $action = null)
	{
		if ($action) {
			$this->action = $action;
			return $this;
		}
		return $this->submitRoute();
	}
	
	protected function submitRoute()
	{
		$routeArray = explode(DIRECTORY_SEPARATOR, trim(request()->getUri(), DIRECTORY_SEPARATOR));
		array_pop($routeArray);
		return implode(DIRECTORY_SEPARATOR, $routeArray);
	}
	
	public function method()
	{
		return $this->method;
	}
	
}
