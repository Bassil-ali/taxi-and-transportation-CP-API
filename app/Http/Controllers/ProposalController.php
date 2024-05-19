<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class ProposalController extends Controller
{

    public static function routeName()
    {
        return Str::snake("proposals");
    }
    public function __construct(Request $request)
    {
        // parent::__construct($request);
        // $this->authorizeResource(Proposal::class,Str::snake("Proposal"));
    }
    public function index(Request $request)
    {
        $Proposals = Proposal::search($request)->sort($request)->paginate(15);

        return response()->view('', compact('Proposals'));
    }

    public function create()
    {

        return response()->view('');
    }


    public function store(StoreProposalRequest $request)
    {
        $proposal = Proposal::create($request->validated());

        return response()->json(['message' => $proposal ? 'Created Successfully' : 'Failed To Create'], $proposal ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request, $id)
    {
        $proposal = Proposal::where('id', $id)->with('user')->first();
        return response()->view('proposals.show', compact('proposal'));
    }

    public function edit(Proposal $proposal)
    {


        return response()->view('', compact('proposal'));
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->update($request->validated());

        return response()->json(['message' => $proposal ? 'Updated Successfully' : 'Failed To Updated'], $proposal ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, Proposal $proposal)
    {

        if ($proposal->accepted_ad()->exists()) {
            return response()->json(['title' => Messages::getMessage('FAILED'), 'message' =>   Messages::getMessage('DELETE_FAILED'), 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }

        $deleted = $proposal->delete();

        if ($deleted) {
            return response()->json(['title' => 'Deleted!', 'message' => ' Deleted Successfully', 'icon' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['title' => 'Failed!', 'message' => 'Delete Failed', 'icon' => 'error'],  Response::HTTP_BAD_REQUEST);
        }
    }
}
