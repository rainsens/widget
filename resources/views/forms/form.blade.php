<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{ $builder->title() }}</span>
        <span style="font-size: 12px"> — {{ $builder->description() }}</span>
    </div>
    <div class="panel-body">
        
        <form
            role="form"
            method="{{ $control->method() }}"
            action="{{ $control->action() }}"
            class="form-horizontal"
            accept-charset="UTF-8"
            enctype="multipart/form-data"
        >
            
            <div class="row">
                @foreach($layout->columns() as $column)
                    <div class="col-md-{{ $column->width() }}">
                        @foreach($column->fields() as $field)
                            {!! $field !!}
                        @endforeach
                    </div>
                @endforeach
            </div>
            
            <div class="form-group">
                <div class="col-md-{{ $layout->width()['label'] }}"></div>
                <div class="col-md-{{ $layout->width()['input'] }} text-right">
                
                </div>
            </div>
            
        </form>
        
    </div>
</div>
