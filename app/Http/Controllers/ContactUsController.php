<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class ContactUsController extends Controller
{

    public static function routeName()
    {
        return Str::kebab("ContactUs");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(ContactUs::class, Str::snake("ContactUs"));
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny', ContactUs::class );

        $contacts = ContactUs::paginate(15);

        return response()->view('contact_us.index', compact('contacts'));
    }

    public function create()
    {
    }


    public function store(StoreContactUsRequest $request)
    {
        $contactUs = ContactUs::create($request->validated());

        return response()->json(['message' => $contactUs ? 'Created Successfully' : 'Failed To Create'], $contactUs ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, ContactUs $contact_u)
    {
        $this->authorize('view',$contact_u );

        return response()->view('contact_us.show', compact('contact_u'));
    }

    public function edit(ContactUs $contact_u)
    {
        $this->authorize('update',$contact_u );

        return response()->view('contact_us.edit', compact('contact_u'));
    }

    public function update(UpdateContactUsRequest $request, ContactUs $contact_u)
    {
        $this->authorize('update',$contact_u );

        $data = $request->validated();
        $data['admin_id'] = auth()->user()->id;
        $contact_u->update($data);

        return response()->json(['message' => $contact_u ? 'Updated Successfully' : 'Failed To Updated'], $contact_u ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, ContactUs $contact_u)
    {
        $this->authorize('delete',$contact_u );

        $contact_u->update(['admin_id' => auth()->user()->id]);
        $deleted = $contact_u->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
