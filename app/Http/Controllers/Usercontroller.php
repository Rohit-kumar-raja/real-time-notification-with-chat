<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Models\User;
use App\Models\UserMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Usercontroller extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): View
    {
        return view('chat.message');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        UserMessage::create([
            'message' => $request->message
        ]);

        event(new TestEvent($request->message));

        return response()->json(['success' => "done"]);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
