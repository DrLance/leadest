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
        $userAnswer  = UserAnswer::where('user_id', auth()->user()->id)->first();
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
                  'mask' => 'https://'
              ],
              [
                'name'        => 'Industry',
                'placeholder' => 'type your industry',
                'type'        => 'select',
                'data'        => [
                  "Accounting",
                  "Airlines / Aviation",
                  "Alternative Dispute Resolution",
                  "Alternative Medicine",
                  "Animation",
                  "Apparel / Fashion",
                  "Architecture / Planning",
                  "Arts / Crafts",
                  "Automotive",
                  "Aviation / Aerospace",
                  "Banking / Mortgage",
                  "Biotechnology / Greentech",
                  "Broadcast Media",
                  "Building Materials",
                  "Business Supplies / Equipment",
                  "Capital Markets / Hedge Fund / Private Equity",
                  "Chemicals",
                  "Civic / Social Organization",
                  "Civil Engineering",
                  "Commercial Real Estate",
                  "Computer Games",
                  "Computer Hardware",
                  "Computer Networking",
                  "Computer Software / Engineering",
                  "Computer / Network Security",
                  "Construction",
                  "Consumer Electronics",
                  "Consumer Goods",
                  "Consumer Services",
                  "Cosmetics",
                  "Dairy",
                  "Defense / Space",
                  "Design",
                  "E - Learning",
                  "Education Management",
                  "Electrical / Electronic Manufacturing",
                  "Entertainment / Movie Production",
                  "Environmental Services",
                  "Events Services",
                  "Executive Office",
                  "Facilities Services",
                  "Farming",
                  "Financial Services",
                  "Fine Art",
                  "Fishery",
                  "Food Production",
                  "Food / Beverages",
                  "Fundraising",
                  "Furniture",
                  "Gambling / Casinos",
                  "Glass / Ceramics / Concrete",
                  "Government Administration",
                  "Government Relations",
                  "Graphic Design / Web Design",
                  "Health / Fitness",
                  "Higher Education / Acadamia",
                  "Hospital / Health Care",
                  "Hospitality",
                  "Human Resources / HR",
                  "Import / Export",
                  "Individual / Family Services",
                  "Industrial Automation",
                  "Information Services",
                  "Information Technology / IT",
                  "Insurance",
                  "International Affairs",
                  "International Trade / Development",
                  "Internet",
                  "Investment Banking / Venture",
                  "Investment Management / Hedge Fund / Private Equity",
                  "Judiciary",
                  "Law Enforcement",
                  "Law Practice / Law Firms",
                  "Legal Services",
                  "Legislative Office",
                  "Leisure / Travel",
                  "Library",
                  "Logistics / Procurement",
                  "Luxury Goods / Jewelry",
                  "Machinery",
                  "Management Consulting",
                  "Maritime",
                  "Market Research",
                  "Marketing / Advertising / Sales",
                  "Mechanical or Industrial Engineering",
                  "Media Production",
                  "Medical Equipment",
                  "Medical Practice",
                  "Mental Health Care",
                  "Military Industry",
                  "Mining / Metals",
                  "Motion Pictures / Film",
                  "Museums / Institutions",
                  "Music",
                  "Nanotechnology",
                  "Newspapers / Journalism",
                  "Non - Profit / Volunteering",
                  "Oil / Energy / Solar / Greentech",
                  "Online Publishing",
                  "Other Industry",
                  "Outsourcing / Offshoring",
                  "Package / Freight Delivery",
                  "Packaging / Containers",
                  "Paper / Forest Products",
                  "Performing Arts",
                  "Pharmaceuticals",
                  "Philanthropy",
                  "Photography",
                  "Plastics",
                  "Political Organization",
                  "Primary / Secondary Education",
                  "Printing",
                  "Professional Training",
                  "Program Development",
                  "Public Relations / PR",
                  "Public Safety",
                  "Publishing Industry",
                  "Railroad Manufacture",
                  "Ranching",
                  "Real Estate / Mortgage",
                  "Recreational Facilities / Services",
                  "Religious Institutions",
                  "Renewables / Environment",
                  "Research Industry",
                  "Restaurants",
                  "Retail Industry",
                  "Security / Investigations",
                  "Semiconductors",
                  "Shipbuilding",
                  "Sporting Goods",
                  "Sports",
                  "Staffing / Recruiting",
                  "Supermarkets",
                  "Telecommunications",
                  "Textiles",
                  "Think Tanks",
                  "Tobacco",
                  "Translation / Localization",
                  "Transportation",
                  "Utilities",
                  "Venture Capital / VC",
                  "Veterinary",
                  "Warehousing",
                  "Wholesale",
                  "Wine / Spirits",
                  "Wireless",
                  "Writing / Editing",
                ],
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
                  'data' => [
                    '1 year',
                    '2 years',
                    '3 years',
                    '4 years',
                    '5 years',
                  ]
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
                'name'     => 'Expand agent/referral program',
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
        $user       = auth()->user();
        $userAnswer = UserAnswer::where('user_id', $user->id)->first();

        if ( ! $userAnswer) {
            $userAnswer = new UserAnswer();
        }

        $userAnswer->user_id      = $user->id;
        $userAnswer->answers      = $request->input('answers');
        $userAnswer->from_ref     = $request->input('from_ref', null);
        $userAnswer->current_step = $request->input('current_step');

        $userAnswer->save();

        if ($userAnswer->current_step === 5) {
            $user->is_agent = true;
            $user->save();
        }

    }

}
