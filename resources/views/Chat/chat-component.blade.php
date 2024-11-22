<div>
    {{-- The Master doesn't talk, he acts. --}}
    <ul>
        @foreach ($convo as $convoItem)
            <li>{{ $convoItem['username'] }}:{{ $convoItem['message'] }}</li>
        @endforeach
    </ul>
    <form wire:submit="submitMessage">
         <input wire:model="message" />
        <button type="submit">Send</button>
    </form>
</div>
{{-- The guy used 
<x-text-input wire:model="message"
--}}
