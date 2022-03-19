@php
    $checked = \Arr::get($data,  $field->name) == $key;
@endphp
@if ($field->left_label)
<x-radio  id="{{ $key }}" value="{{ $key }}" :lg="$field->lg" :md="$field->md" left-label="{{ \Str::title($label) }}"
    wire:model.defer="{{ $field->key }}" />
@else
<x-radio  id="{{ $key }}" value="{{ $key }}" :lg="$field->lg" :md="$field->md" label="{{ \Str::title($label) }}"
    wire:model.defer="{{ $field->key }}" />
@endif