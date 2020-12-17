<?php
namespace Rainsens\Widget\Contracts\Grids;

use Illuminate\Support\Collection;

interface Actions
{
	/**
	 * Add custom action to actions array.
	 *
	 * @param Action $actor
	 * @return Actions
	 */
	public function add(Action $actor): self ;
	
	/**
	 * Get certain action;
	 *
	 * @return Collection
	 */
	public function get(): Collection;
	
	/**
	 * Push all actions to grid items.
	 *
	 * @param $gridItems
	 * @return mixed
	 */
	public function push($gridItems);
}
