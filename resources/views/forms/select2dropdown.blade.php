<div class="form-group">
    <label for="{{ $name }}" class="col-md-2 control-label {{ $errors->has($name) ? 'has-error' : '' }}">
        @if($required)<span class="text-danger">*</span> @endif {{ $label }}
    </label>
    <div class="col-md-9">
        <select
            name="{{ $name }}"
            class="
                {{ $isMultiple ? 'select2-multiple' : 'select2-single' }}
                form-control
                select2dropdown"
            @if($isMultiple)multiple="multiple"@endif>
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
</div>

@push('scripts')
    <script>
		$(function () {
			let dropdown = $('.select2dropdown');
			dropdown.select2({
				placeholder: '{{ $placeholder ? $placeholder : '' }}',
				allowClear: true,
				data: $items,
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
