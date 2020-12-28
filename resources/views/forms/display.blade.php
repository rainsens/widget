{!! $container->start() !!}
    
    {!! $label->render() !!}
    
    {!! $layout->start() !!}
        
        <input class="{{ $element->class() }}" placeholder="{{ $element->value() }}" readonly>

        {!! $help->render() !!}
        
    {!! $layout->end() !!}
    
{!! $container->end() !!}
