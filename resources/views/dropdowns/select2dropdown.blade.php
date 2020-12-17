@if($isMultiple)
	<select class="select2-multiple form-control {{ $color }}" multiple="multiple"></select>
@else
	<select class="select2-single form-control {{ $color }}"></select>
@endif


@push('scripts')
    <script>
		let dropdownData = {!! json_encode($items) !!}
		$(function () {
			
			$(".select2-single").select2({
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
			
			$(".select2-multiple").select2({
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
