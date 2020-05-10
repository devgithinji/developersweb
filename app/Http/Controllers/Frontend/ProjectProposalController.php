<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\ProjectProposal;
use App\Quotations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectProposalController extends Controller
{

    /**
     * ProjectProposalController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('storeTwo');
    }

    public function create(){
        return view('frontend.user.proposal_create');
    }


    public function storeTwo(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'contact' => 'required',
            'description' => 'required|string'
        ]);

        $quotation = new Quotations();
        $quotation->name = $request->name;
        $quotation->contact = $request->contact;
        $quotation->service = $request->service;
        $quotation->description =$request->description;
        $quotation->status = 0;
        $quotation->save();

        return redirect()->back()->with('success','Project Proposal submitted successfully');

    }


    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $proposal = new ProjectProposal();
        $proposal->user_id = Auth::user()->id;
        $proposal->name = $request->name;
        $proposal->description =$request->description;
        $proposal->status = 0;
        $proposal->save();

        return redirect()->back()->with('success','Project Proposal submitted successfully');

    }

    public function view($id){

        $proposal = ProjectProposal::find($id);

        return view('frontend.user.proposal_view',compact('proposal'));
    }
}
