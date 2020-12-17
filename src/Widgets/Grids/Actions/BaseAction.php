<?php
namespace Rainsens\Widget\Widgets\Grids\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Widget\Contracts\Grids\Action;
use Rainsens\Widget\Contracts\Grids\Grid;

abstract class BaseAction implements Action
{
	/**
	 * @var Grid
	 */
	protected $grid;
	
	/**
	 * @var Model|Builder
	 */
	protected $model;
	protected $route;
	
	protected $divide = false;
	
	public function setGrid(Grid $grid): Action
	{
		$this->grid = $grid;
		$this->route = $this->grid->basic()->getGridRoute();
		return $this;
	}
	
	public function setRowModel(Model $rowModel): Action
	{
		$this->model = $rowModel;
		return $this;
	}
	
	public function getKey()
	{
		return $this->model->getKey();
	}
	
	public function getGridRoute(): string
	{
		return $this->route;
	}
	
	abstract public function name(): string ;
	
	abstract public function href(): string ;
	
	public function handle(): void {}
	
	public function __get($name)
	{
		return $this->$name ?? null;
	}
}
