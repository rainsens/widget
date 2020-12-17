<?php
namespace Rainsens\Widget\Widgets\Grid;

use Illuminate\Contracts\View\View;
use Rainsens\Widget\Contracts\Grids\Grid;
use Rainsens\Widget\Contracts\Grid\Renders;

class GridRenders implements Renders
{
	protected $grid;
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
	}
	
	public function response(): View
	{
		$filters        = $this->grid->filter()->render();
		$tools          = $this->grid->tool()->render();
		$title          = $this->grid->basic()->title;
		$description    = $this->grid->basic()->description;
		$columns        = $this->grid->basic()->columns;
		$items          = $this->grid->filter()->paginate();
		
		return view('', [
			'filters'       => $filters,
			'tools'         => $tools,
			'title'         => $title,
			'description'   => $description,
			'columns'       => $columns,
			'items'         => $items,
		]);
	}
}
