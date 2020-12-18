<?php
use Rainsens\Widget\Widgets\Forms\Form\Form;

if (! function_exists('_widget_form')) {
	/**
	 * @param array $form
	 * @return Form
	 */
	function _widget_form(array $form = []) {
		return app(Form::class, ['form' => $form]);
	}
}
