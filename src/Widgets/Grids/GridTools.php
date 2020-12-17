<?php
namespace Rainsens\Widget\Widgets\Grids;

use Illuminate\Support\Collection;
use Rainsens\Widget\Contracts\Grids\Grid;
use Rainsens\Widget\Contracts\Grids\Tools;
use Rainsens\Widget\Widgets\Button\Button;

class GridTools implements Tools
{
	protected $grid;
	
	/**
	 * @var Collection
	 */
	protected $tools;
	/**
	 * @var Collection
	 */
	protected $prepends;
	/**
	 * @var Collection
	 */
	protected $appends;
	
	/**
	 * @var Button
	 */
	protected $button;
	
	protected $options = [
		'show_create_button' => true
	];
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
		
		$this->button = app(Button::class);
		
		$this->tools = collect();
		$this->prepends = collect();
		$this->appends = collect();
		
		$this->tools->push($this->createButton());
		$this->tools->push($this->refreshButton());
	}
	
	public function prepend(string $element = ''): Tools
	{
		$this->prepends->push($element);
		return $this;
	}
	
	public function append(string $element = ''): Tools
	{
		$this->appends->push($element);
		return $this;
	}
	
	public function getCreateRoute(): string
	{
		return sprintf('%s/create', $this->grid->basic()->getGridRoute());
	}
	
	public function createButton()
	{
		return $this->button
			->href($this->getCreateRoute())
			->color('btn-system')
			->icon('fa fa-plus')
			->text('新增')
			->normalButton();
	}
	
	public function refreshButton()
	{
		return $this->button
			->href($this->grid->basic()->getGridRoute())
			->color('btn-info')
			->icon('fa fa-refresh')
			->text('刷新')
			->normalButton();
	}
	
	public function render()
	{
		return $this->tools;
	}
}
