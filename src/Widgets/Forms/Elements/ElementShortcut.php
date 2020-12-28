<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

/**
 * Trait ElementShortcut
 * @package Rainsens\Widget\Widgets\Forms\Elements
 *
 * @property ElementLabel $label;
 * @property ElementInput $input;
 * @property ElementAddon $addon;
 * @property ElementHelp $help;
 * @property ElementError $error;
 * @property ElementView $view;
 * @property ElementLayout $layout;
 */
trait ElementShortcut
{
	/*
	|--------------------------------------------------------------------------
	| Shortcuts of Element
	|--------------------------------------------------------------------------
	|
	| public function width(int $width = null)
	| public function size(string $size = null)
	| public function class(string $inputClass = null)
	| public function disabled(bool $disabled = null)
	| public function autofocus(bool $autofocus = null)
	| public function placeholder($text = null)
	| public function required(...$required)
	| public function readonly($readonly = null)
	| public function value($value = null)
	|
	|
	|
	*/
	
	
	
	/*
	|--------------------------------------------------------------------------
	| Shortcuts of ElementLabel
	|--------------------------------------------------------------------------
	|
	*/
	public function labelWidth(int $width = null)
	{
		return $this->label->width($width);
	}
	
	public function labelClass(string $class = null)
	{
		return $this->label->class($class);
	}
	
	
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of ElementAddon
    |--------------------------------------------------------------------------
    |
    */
	
	public function addonIcons(...$icons)
	{
		return $this->addon->icons($icons);
	}
	
	public function addonTexts(...$texts)
	{
		return $this->addon->texts($texts);
	}
	
	
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of ElementHelp
    |--------------------------------------------------------------------------
    |
    */
	
	public function helpIcon(string $icon = null)
	{
		return $this->help->icon($icon);
	}
	
	public function helpDesc(string $text = null)
	{
		return $this->help->desc($text);
	}
	
	
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of ElementError
    |--------------------------------------------------------------------------
    |
    */
	
	public function errorClass(string $class = null)
	{
		return $this->error->class($class);
	}
	
	public function errorIcon(string $icon = null)
	{
		return $this->error->icon($icon);
	}
	
	public function errorDesc(string $text = null)
	{
		return $this->error->desc($text);
	}
	
	
	/*
    |--------------------------------------------------------------------------
    | Shortcuts of ElementView
    |--------------------------------------------------------------------------
    |
    */
	
	public function viewName(string $name = null)
	{
		return $this->view->name($name);
	}
	
	
	/*
	|--------------------------------------------------------------------------
	| Shortcuts of ElementLayout
	|--------------------------------------------------------------------------
	|
	*/
	
	public function layoutHorizon(bool $isHorizontal = null)
	{
		return $this->layout->horizon($isHorizontal);
	}
}
