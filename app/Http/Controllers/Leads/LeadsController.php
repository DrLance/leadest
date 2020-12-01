<?php


namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use App\Models\UserAnswer;
use Illuminate\Http\Request;


class LeadsController extends Controller
{

    public function index()
    {
        return view('leads.index');
    }

    public function questions()
    {
        $userAnswer = UserAnswer::where('user_id',auth()->user()->id)->first() ;
        $currentStep = $userAnswer ? $userAnswer->current_step : 0;

        $questions = [
          [
            'title'    => 'I am',
            'subtitle' => '',
            'items'    => [
              [
                'name'     => 'Individual (consultant services)',
                'selected' => true,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Project (3-10 people)',
                'selected' => false,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Startup (10-100 people)',
                'selected' => false,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Enterprise',
                'selected' => false,
                'type'     => 'checkbox',
              ],
            ],
          ],
          [
            'title'    => 'General info',
            'subtitle' => '',
            'items'    => [
              [
                'name'        => 'Website',
                'placeholder' => 'https://example.com',
                'type'        => 'input',
              ],
              [
                'name'        => 'Industry',
                'placeholder' => 'type your industry',
                'type'        => 'input',
              ],
              [
                'name'        => 'Social networks',
                'placeholder' => 'Social networks',
                'type'        => 'multiply',
              ],
              [
                'name'        => 'Age of yor business',
                'placeholder' => '3 years',
                'type'        => 'select',
              ],
            ],
          ],
          [
            'title'    => 'I want to',
            'subtitle' => '',
            'items'    => [
              [
                'name'     => 'Find first leads',
                'selected' => true,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Expand lead generation activities',
                'selected' => false,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Expand agent/referral programm',
                'selected' => false,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Customer development',
                'selected' => false,
                'type'     => 'checkbox',
              ],
            ],
          ],
          [
            'title'    => 'Sales',
            'subtitle' => '',
            'items'    => [
              [
                'name'     => 'I talk with leads myself',
                'selected' => true,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'I have salespersons',
                'selected' => false,
                'type'     => 'checkbox',
              ],
            ],
          ],
          [
            'title'    => 'I want',
            'subtitle' => '',
            'items'    => [
              [
                'name'     => 'Only calls',
                'selected' => true,
                'type'     => 'checkbox',
              ],
              [
                'name'     => 'Qualified leads',
                'selected' => false,
                'type'     => 'checkbox',
              ],
            ],
          ],
        ];

        return view('leads.questions', ['questions' => $questions, 'currentStep' => $currentStep]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $userAnswer = UserAnswer::where('user_id', $user->id)->first();

        if ( ! $userAnswer) {
            $userAnswer = new UserAnswer();
        }

        $userAnswer->user_id  = $user->id;
        $userAnswer->answers  = $request->input('answers');
        $userAnswer->from_ref = $request->input('from_ref', null);
        $userAnswer->current_step = $request->input('current_step');

        $userAnswer->save();

        if($userAnswer->current_step === 5) {
            $user->is_agent = true;
            $user->save();
        }

    }

}
