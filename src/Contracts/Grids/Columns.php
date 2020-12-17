<?php
namespace Rainsens\Widget\Contracts\Grids;

interface Columns
{
	public function name(string $name): self ;
	public function label(string $label = ''): self ;
	public function setRelation(string $relation, string $column = null): self ;
}
