<?php
namespace Rainsens\Widget\Contracts\Grids;

use Closure;

interface Grid
{
	/**
	 * Get the grid basic infomation.
	 *
	 * @return Basics
	 */
	public function basic(): Basics ;
	
	/**
	 * Get the grid filter.
	 *
	 * @return Filters
	 */
	public function filter(): Filters ;
	
	/**
	 * Get the grid tool.
	 *
	 * @return Tools
	 */
	public function tool(): Tools ;
	
	/**
	 * Add custom action to grid.
	 *
	 * @return Actions
	 */
	public function action(): Actions ;
	
	/**
	 * Render current grid.
	 *
	 * @return Render
	 */
	public function render(): Render;
	
	/**
	 * Push initial callback to grid from end user.
	 *
	 * @param Closure $fallback
	 * @return Grid
	 */
	public function init(Closure $fallback): self ;
	
	public function title(string $title): self ;
	
	public function description(string $description): self ;
	
	/**
	 * Which columns expected to display.
	 *
	 * @param $name
	 * @param string $label
	 * @return Columns
	 */
	public function column(string $name, string $label = ''): Columns ;
	
	/**
	 * Query builder from end user.
	 *
	 * @param Closure $builder
	 * @return Grid
	 */
	public function query(Closure $builder): self ;
}
