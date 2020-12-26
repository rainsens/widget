<?php
namespace Rainsens\Widget\Widgets\Forms;

use Illuminate\Support\Arr;
use Rainsens\Widget\Widgets\Forms\Elements\Element;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Divider;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Text;

class FormElement
{
	/**
	 * @var Form
	 */
	protected $form;
	
	/**
	 * Fields already attached to current form.
	 *
	 * @var
	 */
	protected $attachedElementFields;
	
	public static $availableFields = [
		'text'              => Text::class,
		'divider'           => Divider::class,
	];
	
	public static $fieldAlias = [];
	
	public function __construct($form)
	{
		$this->form = $form;
		$this->attachedElementFields = collect();
	}
	
	public static function alias(string $field, string $alias)
	{
		static::$fieldAlias[$alias] = $field;
	}
	
	public function attachElementFieldToForm(Element $elementField)
	{
		$this->attachedElementFields->push($elementField);
		return $this;
	}
	
	/**
	 * $form->text();
	 *
	 * @param $method
	 * @return mixed|null
	 */
	public function getElementFieldClassName($method)
	{
		if (isset(static::$fieldAlias[$method])) {
			$method = static::$fieldAlias[$method];
		}
		
		$class = Arr::get(static::$availableFields, $method);
		
		if (class_exists($class)) {
			return $class;
		}
		
		return null;
	}
}
