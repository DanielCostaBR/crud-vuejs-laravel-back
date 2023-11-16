<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function store(string $email)
    {
        try {
            Mail::to($email)->send(new Contact(
                [
                    'fromEmail' => 'danielcostacpt@gmail.com',
                    'subject' => 'Despesa Cadastrada',
                ]
            ));
            return response()->json(["Type" => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
