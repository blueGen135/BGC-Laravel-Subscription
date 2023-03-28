<div class="p-6 text-gray-900">
    <p class="text-2xl text-gray-600 font-bold underline mb-6">Subscribers</p>

    <div class="px-8">
        <input type="text" class="rounded-lg border float-right border-gray-300 mb-4 pl-8 w-1/3" placeholder="Search" wire:model="search">

        @if ($subscribers->isEmpty())
        <div class="flex w-full bg-red-100 p-5  rounded-lg">
           <p class="text-red-400">No subscriber found</p> 
        </div>
    @else
        <table class="w-full">
         <thead class="border-b-2 border-gray-300 text-indigo-600">
            <tr >
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Verified</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($subscribers as $subscriber)
                 <tr class="text-sm text-indigo-900 border-b border-gray-400">
                    <td class="py-4 px-6">{{ $subscriber->email }} </td>
                     <td class="py-4 px-6">{{ optional($subscriber->email_verified_at)->diffForHumans()  ?? 'Never'}}</td>
                     <td class="py-4 px-6 text-center"><button type="button" class="border border-red-500 bg-red-50 hover:bg-red-100 text-black px-5 py-2 rounded-sm" wire:click="delete({{ $subscriber->id }})">Delete</button></td>
                 </tr>
            @endforeach   
         </tbody>
             
        </table>
    @endif   
    </div>

</div>