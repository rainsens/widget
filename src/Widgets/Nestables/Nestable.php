<?php
namespace Rainsens\Widget\Widgets\Nestables;

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
	
	protected $urls = [];
	
	protected $settled;
	
	protected $items = '';
	
	public function __construct(array $data, string $textField, string $parentField, array $urls = [])
	{
		$this->settled = collect();
		
		$data = _recursive($data, $parentField);
		$this->retrieve($data, $textField, $parentField);
		
		$this->addUrls($urls);
	}
	
	protected function addUrls(array $urls)
	{
		foreach ($urls as $key => $url) {
			if (in_array($key, $this->urlTypes)) {
				$this->urls[$key] = $url;
			}
		}
	}
	
	protected function retrieve(array $data, $textField, $parentField, $parentId = 0)
	{
		foreach ($data as $key => $value) {
			if ($value[$parentField] === $parentId) {
				
				// Check if already settled.
				if (! $this->settled->contains($parentField, $value[$parentField])) {
					$this->items .= "<ol class='dd-list'>";
				}
				$this->settled->push($value);
				
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
				
				// Check if still had childen, if not, close the tag.
				if (! collect($data)->contains($parentField, $value[$parentField])) {
					$this->items .= "</ol>\n";
				}
				
				$this->retrieve($data, $textField, $parentField, $value['id']);
				
				// Close the sub tag.
				$this->items .= "</li>";
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
