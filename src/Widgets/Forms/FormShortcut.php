<?php
namespace Rainsens\Widget\Widgets\Forms;

use Closure;

/**
 * Trait FormShortcuts
 * @package Rainsens\Widget\Widgets\Forms
 *
 * @property FormLayout $layout()
 * @property FormBuilder $builder()
 */
trait FormShortcut
{
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of FormBuilder
    |--------------------------------------------------------------------------
    |
    */
	/**
	 * Set or get form title.
	 *
	 * @param string|null $title
	 * @return $this|FormBuilder|string
	 */
	public function title(string $title = null)
	{
		return $this->builder->title($title);
	}
	
	/**
	 * Set or get form description.
	 *
	 * @param string|null $description
	 * @return $this|FormBuilder|string
	 */
	public function description(string $description = null)
	{
		return $this->builder->description($description);
	}
	
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of FormLayout
    |--------------------------------------------------------------------------
    |
    */
	/**
	 * Set form columns.
	 *
	 * @param $width
	 * @param Closure $closure
	 */
	public function column(int $width, Closure $closure)
	{
		$width = $width < 1 ? round(12 * $width) : $width;
		$this->layout->addColumn($width, $closure);
	}
	
	public function horizon(bool $horizontal = null)
	{
		return $this->layout->horizon($horizontal);
	}
}
