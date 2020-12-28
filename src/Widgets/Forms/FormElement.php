<?php
namespace Rainsens\Widget\Widgets\Forms;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Widget\Widgets\Forms\Elements\Element;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Display;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Divider;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Hidden;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Text;
use Rainsens\Widget\Widgets\Forms\Elements\Fields\Textarea;

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
		'divider'           => Divider::class,
		'text'              => Text::class,
		'textarea'          => Textarea::class,
		'display'           => Display::class,
		'hidden'            => Hidden::class,
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
	
	public function setElementFieldValue(Model $model)
	{
		$values = $model->toArray();
		// todo: set field value while editing.
	}
}
