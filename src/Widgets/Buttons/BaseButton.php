<?php
namespace Rainsens\Widget\Widgets\Buttons;

abstract class BaseButton
{
	protected $href;
	protected $target;
	protected $icon;
	protected $text;
	protected $color;
	protected $size;
	protected $state;
	protected $disable;
	protected $round;
	protected $gradient;
	protected $block;
	
	public function __construct(array $button = [])
	{
		$this->href     = $button['href'] ?? '';
		$this->target   = $button['target'] ?? '';
		$this->icon     = $button['icon'] ?? '';
		$this->text     = $button['text'] ?? 'Default';
		$this->color    = $button['color'] ?? 'btn-default';
		$this->size     = $button['size'] ?? 'btn-sm';
		$this->state    = $button['state'] ?? '';
		$this->disable  = $button['disable'] ?? false;
		$this->round    = $button['round'] ?? false;
		$this->gradient = $button['gradient'] ?? false;
		$this->block    = $button['block'] ?? false;
	}
	
	protected function getAttributes()
	{
		$attributes['tag']         = $this->href ? 'a' : 'button';
		$attributes['href']        = $this->href ? "href='{$this->href}'" : '';
		$attributes['target']      = $this->target ? "target='{$this->target}" : '';
		$attributes['icon']        = $this->icon;
		$attributes['text']        = $this->text;
		$attributes['color']       = $this->color;
		$attributes['size']        = $this->size;
		$attributes['state']       = $this->state;
		$attributes['disable']     = $this->disable ? 'disabled' : '';
		$attributes['round']       = $this->round ? 'btn-rounded' : '';
		$attributes['gradient']    = $this->gradient ? 'btn-gradient' : '';
		$attributes['block']       = $this->block ? 'btn-block' : '';
		
		return $attributes;
	}
	
	abstract protected function render();
	
	public function __toString()
	{
		return $this->render();
	}
}
