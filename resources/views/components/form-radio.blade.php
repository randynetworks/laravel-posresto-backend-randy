<div class="form-group">
    <label class="form-label">{{ $label }}</label>
    <div class="selectgroup w-100">
        @foreach ($options as $optionValue => $optionLabel)
            <label class="selectgroup-item">
                <input type="radio" name="{{ $name }}" value="{{ $optionValue }}" class="selectgroup-input"
                       @if ($optionValue == $value) checked @endif>
                <span class="selectgroup-button">{{ $optionLabel }}</span>
            </label>
        @endforeach
    </div>
</div>
