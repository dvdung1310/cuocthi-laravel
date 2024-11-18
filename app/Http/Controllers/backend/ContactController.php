<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class ContactController extends Controller
{
    public function index(){
        $contacts = Feedback::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.contacts.index', compact('contacts'));
    }
}
