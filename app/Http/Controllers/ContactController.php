<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    private $subject_types = [
        'general' => 'General Inquiry',
        'support' => 'Technical Support',
        'returns' => 'Returns & Refunds',
    ];

    public function index() {
        return view('contacts', ['subject_types' => $this->subject_types]);
    }

    public function submit_form(Request $request) {
        try {
            $validated_data = $request->validate([
                'name' => 'required|min:4',
                'email' => ['required', 'email'],
                'subject' => ['required', Rule::in(array_keys($this->subject_types))],
                'message' => 'required|max:100',
            ]);
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Моля, коригирайте грешките в формата и опитайте отново.')
            ;
        }

        if (count($validated_data) == 4) {
            return redirect()->route('contacts')->with('success', 'Вашето съобщение е изпратено успешно!');
        };
    }
}
