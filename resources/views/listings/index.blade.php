<x-layout>

@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($listings) == 0)

@foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach

@else
<p>no listing found</p>~
@endunless
</div>

<div class="nt-6 p-4">
    {{$listings->links()}}
</div>
</x-layout>