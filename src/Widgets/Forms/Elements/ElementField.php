<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

use Illuminate\Support\Str;
use Rainsens\Widget\Widgets\Forms\FormEmbedded;
use Rainsens\Widget\Widgets\Forms\Form;
use Rainsens\Widget\Widgets\Forms\FormNested;

class ElementField
{
	use ElementShortcut;
	
	/**
	 * @var Element
	 */
	protected $element;
	
	/**
	 * Name of field, string or array.
	 *
	 * @var string
	 */
	protected $name;
	
	protected $isJsonField = false;
	
	
	public function __construct(Element $element, $field = '')
	{
		$this->element = $element;
		$this->name = $this->formatFieldName($field);
	}
	
	/**
	 * Name of field.
	 *
	 * @param string $fieldName
	 * @return mixed|string
	 */
	protected function formatFieldName(string $fieldName = '')
	{
		if (Str::contains($fieldName, '->')) {
			$this->isJsonField = true;
			$fieldName = str_replace('->', '.', $fieldName);
		}
		return $fieldName;
	}
	
	public function name()
	{
		return $this->name;
	}
	
}
