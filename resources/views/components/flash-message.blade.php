@if(session()->has('message'))
    <div 
    x-data="{show: true}" 
    x-init="setTimeout(() =>show = false,3000)" 
    x-show="show" 
    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-48 py-3 rounded shadow-lg z-50">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
