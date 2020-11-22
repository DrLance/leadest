<?php


namespace App\Http\Controllers\Leads;
use App\Http\Controllers\Controller;
use App\Models\UserAnswer;
use Illuminate\Http\Request;


class LeadsController extends Controller
{

    public function index() {
        return view('leads.index');
    }

    public function questions() {
        return view('leads.questions');
    }

    public function store(Request $request) {
        $userAnswer = new UserAnswer();

        $userAnswer->user_id = auth()->user()->id;
        $userAnswer->answers = $request->input('answers');
        $userAnswer->from_ref = $request->input('from_ref', null);

        $userAnswer->save();

    }

}
