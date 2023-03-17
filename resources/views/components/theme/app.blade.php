@props([
    'title' => '', 
])
<x-theme.head />


<x-theme.navbar />

<div class="content-wrapper container">

    
    <div class="page-content card">
        <div class="card-header">
            <h3 class="float-start">{{$title}}</h3>
            {{$buttonPage}}
            <x-theme.button href="" icon="fa-plus" addClass="float-end" teks="aldi" size="sm" />
        </div>
        <div class="card-body">
            <section class="row">
                {{ $slot }}
            </section>
        </div>
      
    </div>

</div>

<x-theme.footer />
