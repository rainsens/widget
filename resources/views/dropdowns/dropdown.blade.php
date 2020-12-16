<div class="form-group">
    @if($label)
        <label class="col-md-3 control-label">{{ $label }}</label>
    @endif
    <div class="col-md-8">
        <select
            class="
                {{ $color ?? '' }}
                {{ $isMultiple ? 'select2-multiple' : 'select2-single' }}
                form-control
                select2dropdown"
            @if($isMultiple)multiple="multiple"@endif>
        </select>
    </div>
</div>

@push
    <script>
		$(function () {
			let dropdown = $('.select2dropdown');
			dropdown.select2({
				placeholder: '{{ isset($placeholder) ? $placeholder : '' }}',
				allowClear: true,
				data: '{{ $items }}',
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
