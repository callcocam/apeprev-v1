@livewire('trix', ["field"=>$field,"value"=>\Arr::get($data,\Str::afterLast( $field->key, "data."))])