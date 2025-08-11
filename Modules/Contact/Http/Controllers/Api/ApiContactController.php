<?php

namespace Modules\Contact\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Http\Requests\UpdateContactRequest;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Contact\Transformers\ContactTransformer;

class ApiContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function indexServerSide(Request $request)
    {
        return ContactTransformer::collection($this->contactRepository->serverPaginationFilteringFor($request));
    }

    public function find(Request $request)
    {
        $contactId = $request->contactId;
        $Contact = $this->contactRepository->find($contactId);
        return new ContactTransformer($Contact);
    }

    public function update($ContactId, UpdateContactRequest $request)
    {
        $Contact = $this->contactRepository->find($ContactId);
        $this->contactRepository->update($Contact, $request->all());
        return response()->json([
            'errors' => false,
            'message' => trans('contact::messages.contact updated'),
        ]);
    }

    public function destroy(Contact $Contact)
    {
        $this->contactRepository->destroy($Contact);
        return response()->json([
            'errors' => false,
            'message' => trans('contact::messages.contact deleted'),
        ]);
    }
}
