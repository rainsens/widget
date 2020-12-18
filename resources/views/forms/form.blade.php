<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{ $attributes['title'] }}</span>
    </div>
    <div class="panel-body">
        
        <form
            role="form"
            method="{{ $attributes['method'] }}"
            action="{{ $attributes['action'] }}"
            class="form-horizontal"
            accept-charset="UTF-8"
            enctype="multipart/form-data"
        >
            
            @foreach($fields as $field)
                {!! $field !!}
            @endforeach
            
            <div class="form-group">
                <div class="{{ $attributes['labelCol'] }}"></div>
                <div class="{{ $attributes['fieldCol'] }} text-right">
                    {!! _widget_reset_button() !!}
                    {!! _widget_submit_button() !!}
                </div>
            </div>
            
        </form>
        
    </div>
</div>
