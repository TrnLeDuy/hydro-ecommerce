<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Http\Requests\CreateContactRequest;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Core\Services\TelegramNotification\TelegramNotification;
class PublicController extends BasePublicController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getContact() 
    {
        return view();
    }

    public function createContact()
    {
        return view('page.contact');
    }

    public function storeContact(CreateContactRequest $request)
    {
        try
        {
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 10));
            $contact = [
                'contactCode' => $rand,
                'name' => $request->name,
                'title' => $request->title,
                'message' => $request->message,
                'reply' => null,
                'phone' => $request->phone,
                'email' => $request->email,
            ];
            $contact = $this->contactRepository->create($contact);
            $contact = $this->handleContactTelegramNotification($contact);
            return redirect()->route('fe.contact.contact.create')->with('success', 'Create contact successful');
        }
        catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back();
        }
    }
}