@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-primary-200 primary:text-primary-900']) }}>
    {{ $value ?? $slot }}
</label>
