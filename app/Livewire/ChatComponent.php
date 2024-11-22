<?php

namespace App\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attribute\On;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $message;
    public $convo = [];

    public function mount()
    {
        $messages = Message::all();
        foreach ($messages as $message) {
            $this->convo[] = ['username' => $message->user->name, 'message' => $message->message, 'created_at' => $message->created_at, 'profile_photo_link' =>$message->user->profile_photo_link];
        }
    }

    public function submitMessage()
    {
        // if (empty($this->text)) 
        // {
        //     return;
        // }
        MessageEvent::dispatch(Auth::user()->id, $this->message);
        $this->message = '';
    }

    // #[On('echo:out-channel,MessageEvent')]
    // public function litenForMessage($data)
    // {
    //     $this->convo[] = ['username' => $data[name], 'message' => $data[message]];
    // }
    public function render()
    {
        return view('chat.chat-component');
    }
}
