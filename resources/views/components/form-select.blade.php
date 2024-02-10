<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionLabel->id }}">
                {{ $optionLabel->name }}
            </option>
        @endforeach
    </select>
</div>
