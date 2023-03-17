@props([
    'size' => 'sm', 
    'variant' => 'primary',
    'teks' => 'primary',
    'addClass' => '',
    'href' => '#',
    'icon' => '',
])
<a href="{{$href}}"  class="{{$addClass}} btn btn-{{$size}} icon icon-left btn-{{$variant}}"><i class="fas {{$icon}}"></i> {{$teks}}</a>