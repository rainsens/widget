<?php
namespace Rainsens\Widget\Widgets\Grids\Actions;

class Show extends BaseAction
{
	protected $divide = true;
	
	public function name(): string
	{
		return trans('adm::adm.show');
	}
	
	public function href(): string
	{
		return $this->route . '/' . $this->getKey();
	}
}
