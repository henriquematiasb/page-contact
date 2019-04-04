<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateStoreContact;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

use App\Contact;

class ContactController extends Controller
{

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function generateSubmittedFileName ($attachedFile)
    {
        $prefixName = uniqid(date('HisYmd'));

        $extension = $attachedFile->extension();
        $nameFile = "{$prefixName}.{$extension}";

        return $nameFile;
    }

    public function uploadFile($attachedFile)
    {
        $generatedName = self::generateSubmittedFileName($attachedFile);
        $upload = $attachedFile->storeAs('uploads', $generatedName);

        $path = Storage::url($generatedName);

        return $path;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateStoreContact $request)
    {
            if ($request->hasFile('attachedFile') && $request->file('attachedFile')->isValid()) {
                try {
                    $uploadResult = self::uploadFile($request->attachedFile);
                } catch (\Throwable $th) {
                    return redirect()
                        ->route('contacts.create')
                        ->with('warning', 'Erro interno. Por favor, tente em instantes');
                }

            }

            try {
                $contact = $this->contact->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                    'attached_file' => $uploadResult,
                    'ip_sender' => 'teste',
                ]);
                if ($contact) {
                    return redirect()
                        ->route('contacts.create')
                        ->with('success', 'Cadastro efetuado com sucesso!');

                    dd($uploadResult);
                }


            } catch (\Exception $ex) {
                return redirect()
                    ->route('contacts.create')
                    ->with('warning', 'Erro interno. Por favor, tente em instantes');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
