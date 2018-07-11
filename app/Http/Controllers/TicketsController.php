<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }

    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
        $ticket = new Ticket([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug
        ]);
        $ticket->save();

        return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: ' . $slug);
    }
}
