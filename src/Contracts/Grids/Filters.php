<?php
namespace Rainsens\Widget\Contracts\Grids;

use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Filter
 * @package Rainsens\Adm\Contracts\Grid
 *
 * @see GridFilters
 */
interface Filters
{
	/**
	 * Setting builder from end user.
	 *
	 * @param Closure $callback
	 * @return Filters
	 */
	public function setBuilder(Closure $callback): self ;
	
	/**
	 * @return Builder
	 */
	public function getBuilder(): Builder ;
	
	public function paginate(int $size = 15);
	
	public function get();
	
	/**
	 * Prepend button or other html element.
	 *
	 * @param string $html
	 */
	public function prepend(string $html): void ;
	
	/**
	 * Append button or other html element.
	 *
	 * @param string $html
	 */
	public function append(string $html): void ;
	
	public function render();
}
