@foreach(config("translatable.locales") as $lang)
    @php
        $attributes=[
            'class'=>'form-control',
            'label'=>trans('countries.name').' '.$lang,
            'placeholder'=>trans('countries.name').' '.$lang,
            'required'=>1,
            ];
    @endphp
    @include('admin.form.input',['type'=>'text','name'=>'name:'.$lang,'value'=> $row->name[$lang] ?? null,'attributes'=>$attributes])
@endforeach
