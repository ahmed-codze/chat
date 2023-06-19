<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{

    public $messageText;

    public function render()
    {
        $messages = Message::latest()->take(10)->get()->sortBy('id');
        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => Auth::user()->id,
            'message' => $this->messageText
        ]);
        $this->reset('messageText');
    }
}
