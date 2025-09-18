@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-themecolor ']) }}>
    {{ $value ?? $slot }}
</label>
