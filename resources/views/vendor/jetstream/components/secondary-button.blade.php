<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger text-uppercase']) }}>
    {{ $slot }}
</button>
