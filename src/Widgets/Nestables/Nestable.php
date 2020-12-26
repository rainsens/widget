<?php
namespace Rainsens\Widget\Widgets\Nestables;

use Illuminate\Support\Arr;

class Nestable
{
	const ORDER_URL     = 'order';
	const CREATE_URL    = 'create';
	const EDIT_URL      = 'edit';
	const DELETE_URL    = 'delete';
	const REFRESH_URL   = 'refresh';
	
	protected $urlTypes = [
		self::ORDER_URL,
		self::CREATE_URL,
		self::EDIT_URL,
		self::DELETE_URL,
		self::REFRESH_URL,
	];
	
	protected $urls = [
		self::ORDER_URL => '#',
		self::CREATE_URL => '#',
		self::EDIT_URL => '#',
		self::DELETE_URL => '#',
		self::REFRESH_URL => '#',
	];
	
	protected $data = [
		['id' => 1, 'parent_id' => 0, 'name' => 'Example name 1'],
		['id' => 2, 'parent_id' => 1, 'name' => 'Example name 2'],
		['id' => 3, 'parent_id' => 1, 'name' => 'Example name 3'],
		['id' => 4, 'parent_id' => 1, 'name' => 'Example name 4'],
		['id' => 5, 'parent_id' => 1, 'name' => 'Example name 5'],
		['id' => 6, 'parent_id' => 0, 'name' => 'Example name 6'],
		['id' => 7, 'parent_id' => 6, 'name' => 'Example name 7'],
		['id' => 8, 'parent_id' => 6, 'name' => 'Example name 8'],
		['id' => 9, 'parent_id' => 6, 'name' => 'Example name 9'],
	];
	
	protected $textField = 'name';
	protected $parentField = 'parent_id';
	
	protected $items = '';
	
	public function __construct(
		array $data = [],
		string $textField = '',
		string $parentField = '',
		array $urls = []
	)
	{
		$this->textField = $textField ?? $this->textField;
		$this->parentField = $parentField ?? $this->parentField;
		
		$this->urls = empty($urls) ? $this->urls : $this->addUrls($urls);
		
		$this->data = empty($data) ? $this->data : $data;
		
		// Order the data provided by end user.
		$data = _widget_recursive($this->data, $parentField);
		
		$this->retrieve($data, $this->textField, $this->parentField);
		
	}
	
	protected function addUrls(array $urls)
	{
		$result = [];
		foreach ($urls as $key => $url) {
			if (in_array($key, $this->urlTypes)) {
				$result[$key] = $url;
			}
		}
		return $result;
	}
	
	protected function getSiblings(int $parentId = 0)
	{
		$parentField = $this->parentField;
		return Arr::where($this->data, function ($value) use ($parentField, $parentId) {
			return $value[$parentField] === $parentId;
		});
	}
	
	protected function isFirstChild(array $currentItem, int $parentId = 0)
	{
		$sibings = $this->getSiblings($parentId);
		$firstItem = Arr::first($sibings);
		return $firstItem['id'] === $currentItem['id'];
	}
	
	protected function isLastChild(array $currentItem, int $parentId)
	{
		$sibings = $this->getSiblings($parentId);
		$lastItem = Arr::last($sibings);
		return $lastItem['id'] === $currentItem['id'];
	}
	
	protected function hasChildren(array $currentItem)
	{
		return collect($this->data)->where($this->parentField, $currentItem['id'])->isNotEmpty();
	}
	
	protected function retrieve(array $data, $textField, $parentField, $parentId = 0)
	{
		foreach ($data as $key => $value) {
			if ($value[$parentField] === $parentId) {
				if ($this->isFirstChild($value, $parentId)) {
					$this->items .= "<ol class='dd-list'>\n";
				}
				// Append new item.
				$this->items .= "
					<li class='dd-item' data-id='{$value['id']}'>
			            <div class='dd-handle'>{$value[$textField]}</div>
			            <div style='position: absolute; top: 8px; right: 10px; z-index: 1'>
			                <a href='{$this->urls[self::DELETE_URL]}' class='pull-right'>
			                    <span class='fa fa-trash'></span>
			                </a>
			                <a href='{$this->urls[self::EDIT_URL]}' class='pull-right' style='margin: 1px 3px 0 0'>
			                    <span class='fa fa-edit'></span>
			                </a>
			            </div>
				";
				
				// Remove settled item.
				unset($data[$key]);
				
				if ($this->hasChildren($value)) {
					$this->retrieve($data, $textField, $parentField, $value['id']);
				} else {
					if ($this->isLastChild($value, $parentId)) {
						$this->items .= "</li>\n";
						$this->items .= "</ol>\n";
					} else {
						$this->items .= "</li>\n";
					}
				}
			}
		}
	}
	
	protected function getAttributes()
	{
		$attributes['urls'] = $this->urls;
		$attributes['items'] = $this->items;
		
		return $attributes;
	}
	
	protected function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::nestables.nestable', $attributes)->render();
	}
	
	public function __toString()
	{
		return $this->render();
	}
}
