<div class="fv-row mb-7 {{ $width }}">
    <label class="fs-6 fw-bold mb-2">{{ __('lang.'.$label) }}</label>
    <input type="text" class="form-control form-control-solid"
           name="{{ $name }}"
           value="{{ $value }}"/>
    <div class="invalid-feedback" id="{{ $name }}Message"></div>
</div>
