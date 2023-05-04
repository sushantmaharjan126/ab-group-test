<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $types = DocumentType::paginate(10);

        return view('list.document-types', compact('types'));
    }

    public function create()
    {
        return view('form.document-type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|max:50',
        ]);

        $document = new DocumentType;

        $document->document_type = request('document_type');

        $success = $document->save();

        if($success){
            return redirect()->route('document.type.get')->with('success_message', 'Document Type saved successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Failed to save.');
        }
    }

    public function destory($id)
    {
        $document = DocumentType::find($id);

        if($document){

            $document->delete();

            return redirect()->back()->with('succuss_message', 'Delete successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Delete Failed.');
        }

    }
}
