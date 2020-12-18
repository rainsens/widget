<?php
namespace Rainsens\Widget\Widgets\Buttons;

abstract class BaseButton
{
	protected $href = '';
	protected $target = '';
	protected $icon = '';
	protected $text = 'Default';
	protected $color = 'btn-default';
	protected $size = 'btn-sm';
	protected $state = '';
	protected $disable = false;
	protected $round = false;
	protected $gradient = false;
	protected $block = false;
	
	public function __construct(array $button = [])
	{
		$this->href     = $button['href'] ?? $this->href;
		$this->target   = $button['target'] ?? $this->target;
		$this->icon     = $button['icon'] ?? $this->icon;
		$this->text     = $button['text'] ?? $this->text;
		$this->color    = $button['color'] ?? $this->color;
		$this->size     = $button['size'] ?? $this->size;
		$this->state    = $button['state'] ?? $this->state;
		$this->disable  = $button['disable'] ?? $this->disable;
		$this->round    = $button['round'] ?? $this->round;
		$this->gradient = $button['gradient'] ?? $this->gradient;
		$this->block    = $button['block'] ?? $this->block;
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
