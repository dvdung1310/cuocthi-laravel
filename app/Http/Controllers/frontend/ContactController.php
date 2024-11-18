<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
class ContactController extends Controller
{
    public function index(){
        return view('frontend.contacts.index');
    }

    public function success(){
        return view('frontend.contacts.success');
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback_type' => 'required|string|max:255', 
            'content' => 'string',               
            'full_name' => 'required|string|max:255',     
            'phone_number' => 'required|string|max:15',   
            'address' => 'required|string',              
        ]);

        $feedback = Feedback::create([
            'feedback_type' => $request->feedback_type,
            'content' => $request->content,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return redirect()->route('user.contact.success');
    }
}
