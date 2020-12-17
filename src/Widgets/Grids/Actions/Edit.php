<?php
namespace Rainsens\Widget\Widgets\Grids\Actions;

class Edit extends BaseAction
{
	public function name(): string
	{
		return trans('adm::adm.edit');
	}
	
	public function href(): string
	{
		return $this->route . '/' . $this->getKey() . '/edit';
	}
}
