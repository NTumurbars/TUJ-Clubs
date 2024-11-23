<?php

namespace App\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Livewire\Attribute\On;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function mount($user_id)
    {
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $user_id;
        $this->user = User::find($user_id);

        $messages = Message::where(function ($query) {
            $query->where('sender_id', $this->sender_id)->where('receiver_id', $this->receiver_id);
        })
            ->orWhere(function ($query) {
                $query->where('sender_id', $this->receiver_id)->where('receiver_id', $this->sender_id);
            })
            ->with('sender:id,name', 'receiver:id,name')
            ->get();

        foreach ($messages as $message) {
            $this->chatMessage($message);
        }
    }

    public function sendMessage()
    {
        $message = new Message();
        $message->sender_id = $this->sender_id;
        $message->receiver_id = $this->receiver_id;
        $message->message = $this->message;
        $message->save();

        broadcast(new MessageEvent($message))->toOthers();
        $this->message = '';
    }

    #[On('echo-private:chat-channel.{sender_id},MessageEvent')]
    public function listenForMessage($event)
    {
        dd($event);
    }

    public function chatMessage($message)
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name,
        ];
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
