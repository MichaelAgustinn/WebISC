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
            'type'  => 'required|in:Email,Address,Phone,Open Hours',
            'name'  => 'required',
            'value' => 'required',
        ]);

        // update jika sudah ada, jika belum buat baru
        Contact::updateOrCreate(
            ['type' => $request->type], // kunci unik berdasarkan type
            [
                'name'  => $request->name,
                'value' => $request->value,
            ]
        );

        return redirect()
            ->route('contact.create')
            ->with('success', 'Data ' . $request->type . ' berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type'  => 'required|in:Email,Address,Phone,Open Hours',
            'name'  => 'required',
            'value' => 'required',
        ]);

        $contact = Contact::findOrFail($id);

        $contact->update([
            'type'  => $request->type,
            'name'  => $request->name,
            'value' => $request->value,
        ]);

        return redirect()
            ->route('contact.create')
            ->with('success', 'Data ' . $request->type . ' berhasil diubah');
    }
}
