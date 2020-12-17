<?php
namespace Rainsens\Widget\Widgets\Grids;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Widget\Contracts\Grids\Actions;
use Rainsens\Widget\Contracts\Grids\Basics;
use Rainsens\Widget\Contracts\Grids\Columns;
use Rainsens\Widget\Contracts\Grids\Grid;
use Rainsens\Widget\Contracts\Grids\Filters;
use Rainsens\Widget\Contracts\Grids\Tools;

class MainGrid implements Grid
{
	/**
	 * @var Basics
	 */
	protected $basics;
	
	/**
	 * @var Filters
	 */
	protected $filters;
	
	/**
	 * @var Tools
	 */
	protected $tools;
	
	/**
	 * @var Actions
	 */
	protected $actions;
	
	
	public function __construct(Model $model)
	{
		$this->basics = app(Basics::class);
		$this->basics->setModel($model);
		
		$this->filters = app(Filters::class, ['grid' => $this]);
		$this->tools = app(Tools::class, ['grid' => $this]);
		$this->actions = app(Actions::class, ['grid' => $this]);
		$this->render = app(Render::class, ['grid' => $this]);
	}
	
	public function basic(): Basics
	{
		return $this->basics;
	}
	
	public function filter(): Filters
	{
		return $this->filters;
	}
	
	public function tool(): Tools
	{
		return $this->tools;
	}
	
	public function action(): Actions
	{
		return $this->actions;
	}
	
	public function render(): Render
	{
		return $this->render;
	}
	
	public function title(string $title): Grid
	{
		$this->basics->setTitle($title);
		return $this;
	}
	
	public function description(string $description): Grid
	{
		$this->basics->setDescription($description);
		return $this;
	}
	
	/**
	 * Push initial callback to grid from end user.
	 *
	 * @param Closure $callback
	 * @return Grid
	 */
	public function init(Closure $callback): Grid
	{
		$this->basics->init($callback);
		return $this;
	}
	
	/**
	 * Which column expected to show.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Columns
	 */
	public function column(string $name, string $label = ''): Columns
	{
		return $this->basics->column($name, $label);
	}
	
	/**
	 * Setting builder from end user.
	 *
	 * @param Closure $builder
	 * @return Grid
	 */
	public function query(Closure $builder): Grid
	{
		$this->filters->setBuilder($builder);
		return $this;
	}
}
