@php @endphp
<div class="fv-row mb-7 {{ $width }}">
    <label class="fs-6 fw-bold mb-2"> {{ __('lang.'.$label) }} </label>
    {{--    {{ dd($options) }}--}}

    <select class="form-select form-control-solid datatable-input" @if($isMultiple) multiple
            @endif data-control="select2"
            data-placeholder="@lang('Select an option')" id="{{ $id }}" name="{{ $name }}">
        <option></option>
        @foreach($options as $option)
            <option value="{{ $option['value'] }}"
                    @if($option['selected']) selected @endif> {{ $option['key'] }} </option>
        @endforeach
    </select>
    <div class="invalid-feedback" id="{{ $name }}Message"></div>
</div>
