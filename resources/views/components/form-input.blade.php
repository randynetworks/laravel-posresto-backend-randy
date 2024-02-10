<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}"
           class="form-control @error($errorName) is-invalid @enderror"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name, $value) }}">
    @error($errorName)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
