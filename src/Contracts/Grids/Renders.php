<?php
namespace Rainsens\Widget\Contracts\Grids;

use Illuminate\Contracts\View\View;

interface Renders
{
	public function response(): View ;
}
