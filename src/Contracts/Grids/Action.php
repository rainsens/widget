<?php
namespace Rainsens\Widget\Contracts\Grids;

use Illuminate\Database\Eloquent\Model;

interface Action
{
	public function setGrid(Grid $grid): self ;
	public function setRowModel(Model $rowModel): self ;
	public function getKey();
	public function getGridRoute(): string ;
	public function name(): string ;
	public function href(): string ;
	public function handle(): void ;
	public function __get($name);
}
