<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\DocumentType;
use App\Models\DocumentDetail;
use Illuminate\Http\Request;

class DocumentDetailController extends Controller
{
    public function index()
    {
        $details = DocumentDetail::paginate(10);

        foreach($details as $row)
        {
            $register = Register::where('user_id', $row->register_id)->select('full_name')->first();
            $type = DocumentType::where('document_type_id', $row->type_id)->select('document_type')->first();

            $row->name = $register->full_name;
            $row->type = $type->document_type;
        }

        return view('list.document-details', compact('details'));
    }

    public function create()
    {
        $registers = Register::get();
        $types = DocumentType::get();

        return view('form.document-detail', compact('registers', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'register' => 'required',
            'type' => 'required',
            'document_image1' => 'image|mimes:jpeg,jpg,png,gif|required|max:2048',
            'document_image2' => 'image|mimes:jpeg,jpg,png,gif|required|max:2048',
            'document_image3' => 'image|mimes:jpeg,jpg,png,gif|required|max:2048'
        ]);

        $document = new DocumentDetail;

        $document->register_id = request('register');
        $document->type_id = request('type');

        $file = $request->file('document_image1');
        if ($file != null) {

            $uploadDocument = 'document_image1-'.time(). '.' .$file->getClientOriginalExtension();
            $destinationPath = 'uploads/documents';
            $file->move($destinationPath, $uploadDocument);
            $document->document_image1 = $uploadDocument;

        }

        $file = $request->file('document_image2');
        if ($file != null) {

            $uploadDocument = 'document_image2-'.time(). '.' .$file->getClientOriginalExtension();
            $destinationPath = 'uploads/documents';
            $file->move($destinationPath, $uploadDocument);
            $document->document_image2 = $uploadDocument;

        }

        $file = $request->file('document_image3');
        if ($file != null) {

            $uploadDocument = 'document_image3-'.time(). '.' .$file->getClientOriginalExtension();
            $destinationPath = 'uploads/documents';
            $file->move($destinationPath, $uploadDocument);
            $document->document_image3 = $uploadDocument;

        }

        $success = $document->save();

        if($success){
            return redirect()->route('document.detail.get')->with('success_message', 'Document Type saved successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Failed to save.');
        }
    }

    public function destory($id)
    {
        $document = DocumentDetail::find($id);

        if($document){
            @unlink('uploads/documents/'.$document->document_image1);
            @unlink('uploads/documents/'.$document->document_image2);
            @unlink('uploads/documents/'.$document->document_image3);
            $document->delete();

            return redirect()->back()->with('succuss_message', 'Delete successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Delete Failed.');
        }

    }
}
