<?php

namespace App\Http\Controllers;

use App\Enums\TicketPlatform;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        app()->setLocale('en');
        $this->middleware('auth:admin');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $season_id = request('season_id');

        return view('index', [
            'pendingTicketsCount' => 11,
            'inProgressTicketsCount' => 11,
            'closedTicketsCount' => 3,
            'websitePlatformTicketsCount' => 4,
            'whatsappPlatformTicketsCount' => 34,
            'seasonTicketTypes' => null,
            'seasonTicketZones' => null,
            'seasons' => null,
            'activeSeason' => null,
            'ticketsByMonth' => null,
        ]);
    }

}
