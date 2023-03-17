@props([
'size' => 'sm',
'variant' => 'primary',
'teks' => 'primary',
'addClass' => '',
'id' => '',
'href' => '#',
'icon' => '',
'modal' => 'T',
'idModal' => ''
])
<a href="{{$href}}" id="{{$id}}" @if ($modal=='Y' ) data-bs-toggle="modal" data-bs-target="#{{$idModal}}" @endif
    class="{{$addClass}} btn btn-{{$size}} icon icon-left btn-{{$variant}}">
    <i class="fas {{$icon}}"></i> {{$teks}}
</a>