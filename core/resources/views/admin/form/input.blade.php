<div class="col-md-{{$attributes['col'] ?? '6'}}  col-12">
    <div class="mb-1">
        <label
            class="form-label"
            for="{{$name}}"
        >
            {{$attributes['label']}}
            @if(!empty($attributes['required']) && $attributes['required'] ==1 )
                <span class="text-danger">*</span>
            @endif
        </label>
        <input
            type="{{$type}}"
            name="{{$name}}"
            class="{{$attributes['class']}} form-control"
            id="{{$name}}"
            placeholder="{{$attributes['placeholder']}}"
            {!! isset($attributes['required']) && $attributes['required'] ==1 ? "required" : ''!!}
            value="{{$value ?? null}}"
        >
    </div>
</div>
