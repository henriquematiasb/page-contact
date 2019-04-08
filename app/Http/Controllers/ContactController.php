<?php

namespace App\Http\Controllers;

use Mail;
use App\Contact;
use App\Http\Requests\ValidateStoreContact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


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

        $pathFile = Storage::url($generatedName);

        return $pathFile;
    }

    public function sendEmailSignUp($contact) {
        Mail::send('mail.mailsend', ['informationRegistered' => $contact], function($m) {
            $m->from(\Config::get('mail.from.address'));
            $m->to(\Config::get('mail.to'));
            $m->subject('Novo cadastro de contato');
        });

        return true;
    }

    public function create()
    {
        return view('contact/create');
    }

    public function store(ValidateStoreContact $request)
    {
        $currentDate = date('Y-m-d H:i:s');
        try {
            $uploadResult = self::uploadFile($request->attachedFile);

            $contact = $this->contact->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'attached_file' => $uploadResult,
                'sender_ip' => $request->ip(),
                'shipping_date' => $currentDate,
            ]);

            $sendMailResult = self::sendEmailSignUp($contact);

            if ($uploadResult && $contact && $sendMailResult) {
                return redirect()
                    ->route('contact.create')
                    ->with('success', 'Cadastro efetuado com sucesso!');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('contact.create')
                ->with('warning', 'Erro interno. Por favor, tente em instantes');
        }
    }
}
