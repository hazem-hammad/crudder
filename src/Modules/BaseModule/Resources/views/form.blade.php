<div class="row">

    <x-forms.text-field
        name="name_ar"
        label="Arabic name"
        width="col-12"
        value="{{ isset($row) ? $row->name_ar : null }}"
    />

    <x-forms.text-field
        name="name_en"
        label="English name"
        width="col-12"
        value="{{ isset($row) ? $row->name_en : null }}"
    />

    <x-forms.password-field
        name="name_en"
        label="Password"
        width="col-12"
    />

    <x-forms.select-field
        name="status"
        label="Select status"
        :options="[
            ['key' => 'Active', 'value' => 1, 'selected' => isset($row) && $row->status == 1 ? true : null],
            ['key' => 'In-active', 'value' => 0, 'selected' => isset($row) && $row->status == 0 ? true : null],
        ]"
        width="col-12"
    />
</div>
