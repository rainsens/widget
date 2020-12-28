{!! $container->start(true) !!}

    {!! $label->render() !!}
    {!! $layout->start() !!}

        <textarea
            id="{{ $element->id() }}"
            name="{{ $element->name() }}"
            class="form-control {{ $element->size() }} {{ $element->class() }}"
            rows="{{ $element->rows() }}">
        </textarea>

        {!! $help->render() !!}
        {!! $error->render() !!}

    {!! $layout->end() !!}
{!! $container->end() !!}
