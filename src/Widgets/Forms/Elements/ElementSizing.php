<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementSizing
{
	protected $element;
	
	protected $size = [
		/**
		 * form-group-lg, form-group-sm
		 *
		 * <div class="form-group form-group-lg">
		 *      ...
		 * </div>
		 */
		'form.group'     => 'form-group-sm',
		
		/**
		 * <div class="input-group input-group-sm">
		 *      <span class="input-group-addon" id="sizing-addon3">@</span>
		 *      <input type="text" class="form-control">
		 *      <span class="input-group-addon" id="sizing-addon3">@</span>
		 * </div>
		 */
		'input.group'    => 'input-group-sm',
		
		/**
		 * input-lg, input-sm
		 *
		 * <input class="form-control input-sm">
		 *
		 */
		'input'         => 'input-sm',
	];
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function size(...$size)
	{
		$size = collect($size)->flatten();
		if ($size->isEmpty()) {
			return $this->size;
		}
		$this->size['form.group'] = (string)$size[0];
		$this->size['input.group'] = (string)$size[1];
		$this->size['input'] = (string)$size[2];
		return $this->element;
	}
}
