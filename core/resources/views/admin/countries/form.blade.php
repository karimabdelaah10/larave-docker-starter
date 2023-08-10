<!-- Start Text -->
@foreach(config("translatable.locales") as $lang)
    @php
        $attributes=[
            'class'=>'',
            'label'=>trans('countries.name').' '.$lang,
            'placeholder'=>trans('countries.name').' '.$lang,
            'required'=>1,
            ];
    @endphp
    @include('admin.form.input',['type'=>'text','name'=>'name:'.$lang,'value'=> $row->name[$lang] ?? null,'attributes'=>$attributes])
@endforeach
<!-- End Text -->
<!-- Start Select -->
@php
    $attributes=[
        'class'=>'',
        'label'=>trans('countries.name'),
        'placeholder'=>trans('countries.name'),
        'required'=>1,
        'col'=>12,
        ];
@endphp
@include('admin.form.select',[
    'type'=>'text',
    'name'=>'name:',
    'options'=> [] ,
    'value'=> $row->name ?? null,'attributes'=>$attributes
    ])
<!-- End Select -->
<!-- Start CheckBox -->
@php
    $attributes=[
        'class'=>'',
        'label'=>'What is Your Favorite Pet?',
        'placeholder'=>trans('countries.name'),
        'required'=>1,
        'col'=>12,
        ];
@endphp
@include('admin.form.check_box',[
    'name'=>'name:',
    'options'=> [
         1 => 'cow',
         2 => 'lion',
         3 => 'tiger',
         4 => 'cat',
         5 => 'dog',
         6 => 'bird',
         7 => 'fish',
         8 => 'snake',
         9 => 'monkey',
         10 => 'elephant',
        ] ,
    'value'=> $row->name ?? null,'attributes'=>$attributes
    ])
<!-- End CheckBox -->
<!-- Start TextArea -->
@php
    $attributes=[
        'class'=>'',
        'label'=>'What is Your Favorite Pet?',
        'placeholder'=>trans('countries.name'),
        'required'=>1,
        'col'=>12,
        ];
@endphp
@include('admin.form.text_area',[
    'name'=>'textArea:',
    'value'=> $row->name ?? null,'attributes'=>$attributes
    ])
<!-- End TextArea -->
