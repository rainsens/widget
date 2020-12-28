{!! $container->start() !!}
    
    {!! $label->render() !!}
    
    {!! $layout->start() !!}
        
        {!! $addon->left() !!}
            
            <input
                type="text"
                id="{{ $element->id() }}"
                name="{{ $element->name() }}"
                class="form-control {{ $element->size() }} {{ $element->class() }}"
                placeholder="{{ $element->placeholder() }}"
                {{ $element->autofocus() ? 'autofocus' : '' }}
                {{ $element->disabled() ? 'disabled' : '' }}
                {{ $element->readonly() ? 'readonly' : '' }}
                {{ $element->required()['require'] ? 'required' : '' }}
                {{ implode(' ', $element->attributes()) }}>
            
        {!! $addon->right() !!}
        
        {!! $help->render() !!}
        {!! $error->render() !!}
        
    {!! $layout->end() !!}
    
{!! $container->end() !!}

@push('scripts')
    @if($element->inputmask())
        <script>
            $(function () {
            	/*
                    $('.date').mask('99/99/9999');
                    $('.time').mask('99:99:99');
                    $('.date_time').mask('99/99/9999 99:99:99');
                    $('.zip').mask('99999-999');
                    $('.phone').mask('(999) 999-9999');
                    $('.phoneext').mask("(999) 999-9999 x99999");
                    $(".money").mask("999,999,999.999");
                    $(".product").mask("999.999.999.999");
                    $(".tin").mask("99-9999999");
                    $(".ssn").mask("999-99-9999");
                    $(".ip").mask("9ZZ.9ZZ.9ZZ.9ZZ");
                    $(".eyescript").mask("~9.99 ~9.99 999");
                    $(".custom").mask("9.99.999.9999");
            	*/
                $('#'+'{{ $element->id() }}').mask('{{ $element->inputmask() }}')
            });
        </script>
    @endif
@endpush
