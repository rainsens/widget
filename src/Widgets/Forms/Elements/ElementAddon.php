<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementAddon
{
	/**
	 * @var Element
	 */
	protected $element;
	
	const PLACE_L = 'left';
	const PLACE_R = 'right';
	
	protected $icons = [self::PLACE_L => '', self::PLACE_R => ''];
	protected $texts = [self::PLACE_L => '', self::PLACE_R => ''];
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function icons(...$icons)
	{
		$icons = collect($icons)->flatten();
		if ($icons->isEmpty()) {
			return $this->icons;
		}
		$this->icons[self::PLACE_L] = $icons->first();
		$this->icons[self::PLACE_R] = $icons->last();
		return $this->element;
	}
	
	public function texts(...$texts)
	{
		$texts = collect($texts)->flatten();
		if ($texts->isEmpty()) {
			return $this->texts;
		}
		$this->texts[self::PLACE_L] = $texts->first();
		$this->texts[self::PLACE_R] = $texts->last();
		return $this->element;
	}
	
	public function hasIcon($place = self::PLACE_L)
	{
		return !empty($this->icons[$place]);
	}
	
	public function hasText($place = self::PLACE_L)
	{
		return !empty($this->texts[$place]);
	}
	
	public function has()
	{
		return $this->hasIcon() or $this->hasText();
	}
	
	/**
	 * Render current addon on left side.
	 *
	 * @return string
	 */
	public function left()
	{
		if ($this->has()) {
			$html = "<div class='input-group '>";
			
			if ($this->hasIcon(self::PLACE_L)) {
				$html .= "<span class='input-group-addon'><i class='fa {$this->icons[self::PLACE_L]}'></i></span>";
			}
			if ($this->hasText(self::PLACE_L)) {
				$html .= "<span class='input-group-addon'>{$this->texts[self::PLACE_L]}</span>";
			}
			
			return $html;
		}
		return '';
	}
	
	/**
	 * Render current addon on right side.
	 *
	 * @return string
	 */
	public function right()
	{
		if ($this->has()) {
			$html = '';
			if ($this->hasIcon(self::PLACE_R)) {
				$html .= "<span class='input-group-addon'><i class='fa {$this->icons[self::PLACE_R]}'></i></span>";
			}
			if ($this->hasText(self::PLACE_R)) {
				$html .= "<span class='input-group-addon'>{$this->texts[self::PLACE_R]}</span>";
			}
			$html .= "</div>";
			
			return $html;
		}
		return '';
	}
}
