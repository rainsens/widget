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
	| Shortcuts of ElementInput
	|--------------------------------------------------------------------------
	|
	*/
	public function inputWidth(int $width = null)
	{
		return $this->input->width($width);
	}
	
	public function inputSize(string $size = null)
	{
		return $this->input->size($size);
	}
	
	public function inputClass(string $inputClass = null)
	{
		return $this->input->class($inputClass);
	}
	
	public function inputDisabled(bool $disabled = null)
	{
		return $this->input->disabled($disabled);
	}
	
	public function inputAutofocus(bool $autofocus = null)
	{
		return $this->input->autofocus($autofocus);
	}
	
	public function inputPlaceholder($text = null)
	{
		return $this->input->placeholder($text);
	}
	
	public function inputRequired(...$required)
	{
		return $this->input->required($required);
	}
	
	public function inputReadonly($readonly = null)
	{
		return $this->input->readonly($readonly);
	}
	
	public function inputValue($value = null)
	{
		return $this->input->value($value);
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
