<?php
namespace Rainsens\Widget\Contracts\Grids;

interface Tools
{
	public function prepend(): self ;
	
	public function append(): self ;
	
	public function render();
}
