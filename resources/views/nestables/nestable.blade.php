@inject('Nestable', 'Rainsens\Widget\Widgets\Nestables\Nestable')

<menu id="nestable-menu" class="text-right mb10">
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary btn-sm">
            <input data-action="expand-all" type="radio" name="options" id="option1" autocomplete="off" checked>
            <span class="fa fa-plus-square-o"></span> 展开
        </label>
        <label class="btn btn-primary btn-sm">
            <input data-action="collapse-all" type="radio" name="options" id="option2" autocomplete="off">
            <span class="fa fa-minus-square-o"></span> 收起
        </label>
        <label class="btn btn-success btn-sm ml5 data-create">
            <span class="fa fa-plus"></span> 新增
        </label>
        <label class="btn btn-info btn-sm data-save">
            <span class="fa fa-save"></span> 保存
        </label>
        <label class="btn btn-info btn-sm data-refresh">
            <span class="fa fa-refresh"></span> 刷新
        </label>
    </div>
</menu>

{{--<textarea id="nestable-output" class="form-control"></textarea>--}}

<!-- List 1 -->
<div class="dd mb35" id="nestable">
    {!! $items !!}
</div>

@push('scripts')
    <script>
		jQuery(document).ready(function() {
			
			let items = [];
			let updateOutput = function(e) {
				let list = e.length ? e : $(e.target),
					output = list.data('output');
				if (window.JSON) {
					items = (list.nestable('serialize'));
					console.log(items);
					// For test.
					//output.val(window.JSON.stringify(list.nestable('serialize')));
				}
			};
			
			let nestable = $('#nestable');
			nestable.nestable({
				group: 1
			}).on('change', updateOutput);
			
			// For test
			//updateOutput(nestable.data('output', $('#nestable-output')));
			
			$('#nestable-menu').on('change', function(e) {
				let target = $(e.target),
					action = target.data('action');
				if (action === 'expand-all') {
					$('.dd').nestable('expandAll');
				}
				if (action === 'collapse-all') {
					$('.dd').nestable('collapseAll');
				}
			});
			
			// Save
			$('.data-save').click(function () {
				
				if (!items.length) {
					return  false;
				}
				axios.post('{{ $orderUrl }}', {data: items})
				.then(function (res) {
					
					admNotify('system', 'Saved Successfully')
					
				}, function (err) {
				
				});
			});
			
			// Create
			$('.data-create').click(function () {
				location.href = '{{ $urls[Nestable::CREATE_URL] }}';
			});
			
			// Refresh
			$('.data-refresh').click(function () {
				location.href = '{{ $urls[Nestable::REFRESH_URL] }}';
			});
		});
    </script>
@endpush
