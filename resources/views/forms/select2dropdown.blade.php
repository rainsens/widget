<div class="form-group">
	
	@if($isMultiple)
		
		<label for="{{ $id }}" class="{{ $labelCol }} control-label {{ $errors->has($name) ? 'has-error' : '' }}">
			@if($required)<span class="text-danger">*</span> @endif {{ $label }}
		</label>
		<div class="{{ $fieldCol }}">
			<select id="{{ $id }}" name="{{ $name }}" class="select2-multiple form-control " multiple="multiple"></select>
			@if($errors->has($name))
				<span class="append-icon right"><i class="fa fa-remove"></i></span>
				<span class="help-block mt5"><i class="fa fa-remove"></i> {{ $errors->first($name) }}</span>
			@endif
			@if($help)
				<span class="help-block mt5">
					<i class="fa fa-info-circle"></i> {!! $help !!}
				</span>
			@endif
		</div>
		
	@else
		
		<label for="{{ $id }}" class="{{ $labelCol }} control-label {{ $errors->has($name) ? 'has-error' : '' }}">
			@if($required)<span class="text-danger">*</span> @endif {{ $label }}
		</label>
		<div class="{{ $fieldCol }}">
			<select id="{{ $id }}" name="{{ $name }}" class="select2-single form-control">
			</select>
			@if($errors->has($name))
				<span class="append-icon right"><i class="fa fa-remove"></i></span>
				<span class="help-block mt5"><i class="fa fa-remove"></i> {{ $errors->first($name) }}</span>
			@endif
			@if($help)
				<span class="help-block mt5">
					<i class="fa fa-info-circle"></i> {!! $help !!}
				</span>
			@endif
		</div>
		
	@endif
</div>

@push('scripts')
    <script>
		var dropdownData = {!! json_encode($items) !!}
		$(function () {
			
			$('#{{ $id }}').select2({
				placeholder: '{{ $placeholder }}',
				allowClear: true,
				data: dropdownData,
				escapeMarkup: function(markup) {
					return markup;
				},
				templateResult: function(data) {
					return data.html;
				},
				templateSelection: function(data) {
					return data.text;
				}
			});
		});
    </script>
@endpush
