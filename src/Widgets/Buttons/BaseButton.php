<?php
namespace Rainsens\Widget\Widgets\Buttons;

abstract class BaseButton
{
	protected $href     = '';
	protected $target   = '';
	protected $icon     = '';
	protected $text     = '';
	protected $color    = 'btn-default';
	protected $size     = 'btn-sm';
	protected $state    = '';
	protected $disable  = false;
	protected $round    = false;
	protected $gradient = false;
	protected $block    = false;
	
	public function href(string $url = '', string $target = '')
	{
		$this->href = $url;
		$this->target = $target;
		return $this;
	}
	
	public function icon(string $icon = '')
	{
		$this->icon = $icon;
		return $this;
	}
	
	public function text(string $text = '')
	{
		$this->text = $text;
		return $this;
	}
	
	public function color(string $color = '')
	{
		$this->color = $color;
		return $this;
	}
	
	public function state(string $state = '')
	{
		$this->state = $state;
		return $this;
	}
	
	public function size(string $size = '')
	{
		$this->size = $size;
		return $this;
	}
	
	public function block(bool $block = false)
	{
		$this->block = $block;
		return $this;
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
