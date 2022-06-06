<x-button  
:xs="$action->xs"
:md="$action->md"
:lg="$action->lg"
:primary="$action->primary"
:secondary="$action->secondary"
:positive="$action->positive"
:negative="$action->negative"
:warning="$action->warning"
:info="$action->info	"
:dark="$action->dark"
:rounded="$action->rounded"
:squared="$action->squared"
:bordered="$action->bordered"
:flat="$action->flat"
:color="$action->color"
:size="$action->size"
label="{{__($action->label)}}"
icon="{{$action->icon}}"
rightIcon="{{$action->rightIcon}}"
:spinner="$action->spinner"
x-on:confirm="{
    title:'{{ $action->title }}',
    description:'{{ $action->description }}',
    icon: '{{ $action->dialogIcon }}',
    method: '{{ $action->method }}',
    params: '{{ data_get($model, $checkboxAttribute) }}'
}"/>