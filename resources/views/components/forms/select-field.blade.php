@php use App\Enums\ActivationType; @endphp
<div class="fv-row mb-7 {{ $width }}">
    <label class="fs-6 fw-bold mb-2"> {{ __('lang.'.$label) }} </label>
    <select class="form-select form-control-solid datatable-input" @if($isMultiple) multiple @endif data-control="select2"
            data-placeholder="@lang('Select an option')" id="{{ $id }}" name="{{ $name }}">
        <option></option>
        @foreach($options as $option)
            <option value="{{ $option['value'] }}"> {{ $option['key'] }} </option>
        @endforeach
    </select>
</div>
