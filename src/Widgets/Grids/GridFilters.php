<?php
namespace Rainsens\Widget\Widgets\Grids;

use Closure;
use Rainsens\Widget\Contracts\Grids\Grid;
use Illuminate\Database\Eloquent\Builder;
use Rainsens\Widget\Contracts\Grids\Filters;

class GridFilters implements Filters
{
	protected $grid;
	
	protected $model;
	
	protected $builder;
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
		$this->model = $grid->basic()->model;
	}
	
	public function setBuilder(Closure $builder): Filters
	{
		$this->builder = $builder;
		return $this;
	}
	
	public function getBuilder(): Builder
	{
		return call_user_func($this->builder, $this->model);
	}
	
	public function paginate(int $size = 15)
	{
		$items = null;
		if ($this->getBuilder() instanceof Builder) {
			$items = $this->getBuilder()->paginate($size);
		} else {
			$items = $this->getBuilder();
		}
		
		if ($items) {
			return $this->grid->action()->push($items);
		}
		return null;
	}
	
	public function get()
	{
		$items = null;
		if ($this->getBuilder() instanceof Builder) {
			$items = $this->getBuilder()->get();
		} else {
			$items = $this->getBuilder();
		}
		
		if ($items) {
			return $this->grid->action()->push($items);
		}
		return null;
	}
	
	public function prepend(string $html): void
	{
	
	}
	
	public function append(string $html): void
	{
	
	}
	
	public function render()
	{
	
	}
}
