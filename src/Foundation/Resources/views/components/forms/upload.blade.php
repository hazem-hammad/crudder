<div class="fv-row mb-7 {{ $width }}">
    <label class="fs-6 fw-bold mb-2">{{ __('lang.'.$label) }}</label>
    <input type="file" class="form-control form-control-solid"
           name="{{ $name }}"/>
    <div class="invalid-feedback" id="{{ $name }}Message"></div>
</div>
