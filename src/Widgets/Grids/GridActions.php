<?php
namespace Rainsens\Widget\Widgets\Grids;

use Illuminate\Support\Collection;
use Rainsens\Widget\Contracts\Grids\Actions;
use Rainsens\Widget\Contracts\Grids\Action;
use Rainsens\Widget\Contracts\Grids\Grid;

class GridActions implements Actions
{
	protected $grid;
	
	/**
	 * @var Collection
	 */
	protected $actions;
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
		$this->actions = collect();
	}
	
	public function add(Action $actor): Actions
	{
		$actor->setGrid($this->grid);
		$this->actions->push($actor);
		
		return $this;
	}
	
	public function get(): Collection
	{
		return $this->actions;
	}
	
	public function push($gridItems)
	{
		foreach ($gridItems as $item) {
			$actions = [];
			foreach ($this->actions as $action) {
				$actions[] = $action->setRowModel($item);
			}
			$item['actions'] = $actions;
		}
		
		return $gridItems;
	}
}
