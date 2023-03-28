<div 
x-data="{
    showSubscribe:@entangle('showSubscribe'), showSuccess:@entangle('showSuccess')}" 
class="flex flex-col bg-indigo-900 w-full h-screen">
    <nav class="flex pt-5 max-w-7xl justify-between container mx-auto text-indigo-200 items-center">
        <a href="/" class="text-4xl font-bold"><x-application-logo class="w-16 h-16 fill-current"></x-application-logo></a>
        <div class="flex justify-end">
            @auth
              <a href="{{ route('dashboard') }}">Dashboard</a>  
            @else 
              <a href="{{ route('login') }}">Login</a>  
            @endauth
        </div>
    </nav>
            <div class="flex items-center h-full max-w-7xl mx-auto">
                <div class="flex flex-col w-1/2 items-start">
                    <h1 class="text-white text-5xl font-bold leading-tight mb-4">Simple generic landing page to subscribe</h1>
                    <p class="text-indigo-200 text-xl mb-10">We are just checking the <span class="font-bold underline">TALL</span> stack. Would you mind subscribing</p>
                    <button type="button" class="py-3 px-8 bg-red-500 hover:bg-red-600 text-white rounded-sm uppercase" 
                    @click="showSubscribe = true"
                    >Subscribe</button>
                </div>
            </div>
<x-mymodal class="bg-pink-500" trigger="showSubscribe">
    <p class="text-white text-5xl font-extrabold text-center pt-6">Let's do it!</p>
    <form action="" wire:submit.prevent="subscribe" class="flex flex-col items-center p-20">
     <input class="py-3 px-3 w-80 border border-blue-400 rounded-sm" type="email" name="email" wire:model.defer="email" placeholder="Email Address">
        <span class="text-gray-100 text-xs">
            {{ $errors->has('email')  ? $errors->first('email') : ' We will send you a conformation email.'}}
        </span>
        <button class="px-5 py-3 mt-5 w-80 bg-blue-500 justify-center text-white uppercase rounded-sm">
            <span class="animate-spin" wire:loading wire:target="subscribe">&#9696;</span>
            <span wire:loading.remove wire:target="subscribe">Get In</span>
        </button>
    </form>

</x-mymodal>

<x-mymodal class="bg-green-500 p-10" trigger="showSuccess">
    <p class="text-white text-9xl animate-pulse font-extrabold text-center ">&check;</p>
    <p class="text-white text-5xl font-extrabold text-center mt-16">Great</p>
    @if (request()->has('verified') && request()->verified == 1)
    <p class="text-white text-3xl text-center">
        Thanks for confirming.
    </p>
    @else
    <p class="text-white text-3xl text-center">
        See you in your inbox
    </p>
    @endif
    
</x-mymodal>

   </div>