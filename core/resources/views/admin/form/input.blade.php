<div class="col-{{$attributes['col'] ?? '5'}} form-col">
    <div class="mb-1">
        <label class="form-label" for="{{$name}}">
            {{$attributes['label']}}
            @if(!empty($attributes['required']) && $attributes['required'] ==1 )
                <span class="text-danger">*</span>
            @endif
        </label>
        <input
            type="{{$type}}"
            name="{{$name}}"
            class="{{$attributes['class']}}"
            id="{{$name}}"
            placeholder="{{$attributes['placeholder']}}"
            required="{{$attributes['required']}}"
        >
    </div>
</div>
