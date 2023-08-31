<div class="row">

    <x-forms.text-field
        name="name_ar"
        label="Arabic name"
        width="col-12"
    />

    <x-forms.text-field
        name="name_en"
        label="English name"
        width="col-12"
    />

    <x-forms.select-field
        name="status"
        label="Select status"
        :options="[
            ['key' => 'Active', 'value' => 1],
            ['key' => 'In-active', 'value' => 0],
        ]"
        width="col-12"
    />
</div>
