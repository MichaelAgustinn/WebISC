<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $data = Contact::whereIn('type', ['Email', 'Address', 'Phone', 'Open Hours'])->get()->keyBy('type');
        return view('dashboard.contact.contact', [
            'email' => !empty($data['Email']) ?  $data['Email'] : null,
            'address' => $data['Address'] ?? null,
            'phone' => $data['Phone'] ?? null,
            'open_hours' => $data['Open Hours'] ?? null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]);

        $data = new Contact();
        $data->type = $request->type;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->save();

        return redirect()->route('contact.create')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]);

        $data = Contact::find($request->id);
        $data->type = $request->type;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->save();

        return redirect()->route('contact.create')->with('success', 'Data Berhasil Diubah');
    }
}
