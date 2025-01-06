<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = Channel::paginate(10);
        return view('channels.index', compact('channels'));
    }


    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
    
        $channel = new Channel();
        $channel->ChannelName = $request->ChannelName;
        $channel->Description = $request->Description;
        $channel->SubscribersCount = $request->SubscribersCount;
        $channel->URL = $request->URL;
        $channel->Email = $request->Email;
        
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = $file->store('channels', 'public');
        //     $channel->image = $path;
        // }
        
        $channel->save();
        return redirect()->route('channels.index')->with('success', 'Channel created successfully');
    }

    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, $id)
    {
        $channel = Channel::findOrFail($id);
        $channel->ChannelName = $request->ChannelName;
        $channel->Description = $request->Description;
        $channel->SubscribersCount = $request->SubscribersCount;
        $channel->URL = $request->URL;

        $channel->Email = $request->Email;

        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('channels', 'public');
        //     $channel->image = $path;
        // }
        $channel->save();

        return redirect()->route('channels.index')->with('success', 'Channel updated successfully');
    }

    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        $channel->delete();
        return redirect()->route('channels.index')->with('success', 'Channel deleted successfully');
    }
}