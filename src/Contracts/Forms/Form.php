<?php
namespace Rainsens\Widget\Contracts\Forms;

interface Form
{
	public function basic(): Basic;
	
	public function tool(): Tool;
}
