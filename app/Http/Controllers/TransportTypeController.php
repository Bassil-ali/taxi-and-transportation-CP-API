<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreTransportTypeRequest;
use App\Http\Requests\UpdateTransportTypeRequest;
use App\Models\TransportType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TransportTypeController extends Controller
{

    public static function routeName()
    {
        return Str::snake("transport-types");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authorizeResource(TransportType::class,Str::snake("TransportType"));
    }
    public function index(Request $request)
    {
        $transport_types = TransportType::search($request)->sort($request)->paginate(15);

        return response()->view('transport_types.index', compact('transport_types'));
    }

    public function create()
    {

        return response()->view('transport_types.create');
    }


    public function store(StoreTransportTypeRequest $request)
    {
        $transportType = TransportType::create($request->validated());

        return response()->json(['message' => $transportType ? 'Created Successfully' : 'Failed To Create'], $transportType ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, TransportType $transportType)
    {
        return response()->view('', compact('transportType'));
    }

    public function edit(TransportType $transportType)
    {


        return response()->view('transport_types.edit', compact('transportType'));
    }

    public function update(UpdateTransportTypeRequest $request, TransportType $transportType)
    {
        $transportType->update($request->validated());

        return response()->json(['message' => $transportType ? 'Updated Successfully' : 'Failed To Updated'], $transportType ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, TransportType $transportType)
    {
        if ($transportType->ads()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }

        $deleted = $transportType->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
