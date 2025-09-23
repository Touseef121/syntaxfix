<div wire:ignore class="custom-select2">
    <select id="{{$name}}" class="w-full" @if($disabled) disabled @endif data-model="{{ $model }}">
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option)
        <option value="{{ $option['id'] }}" {{ $option['id'] == $value ? 'selected' : '' }}>
            {{ $option['name'] }}
        </option>
        @endforeach
    </select>
</div>

@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endassets

@script
<script>
    $(document).ready(function() {
        $('#{{ $name }}').select2();
        $('#{{ $name }}').on('change',function(event){
            @this.$set('value',event.target.value);
        });
    });

</script>
@endscript
