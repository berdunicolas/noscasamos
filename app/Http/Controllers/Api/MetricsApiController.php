<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetricsApiController extends Controller
{
    public function createdInvitationsGraph(Request $request)
    {
        $year = (int) $request->input('year', now()->year);
        $yearDiff = $request->input('yearDiff');

        $years = [$year];
        if ($yearDiff) {
            $years[] = (int) $yearDiff;
        }

        $rawData = Event::selectRaw("
                DATE_FORMAT(created_at, '%Y-%m') as month,
                MONTH(created_at) as month_number,
                YEAR(created_at) as year,
                plan,
                COUNT(*) as total
            ")
            ->whereIn(DB::raw('YEAR(created_at)'), $years)
            ->groupBy('month', 'month_number', 'year', 'plan')
            ->orderBy('month_number')
            ->get();

        $formatted = [];
        foreach ($rawData as $entry) {
            $formatted[] = [
                'month' => $entry->month,
                'month_number' => $entry->month_number,
                'year' => $entry->year,
                'plan' => $entry->plan,
                'total' => $entry->total,
            ];
        }

        return response()->json($formatted);
    }

    public function totalInvitationsGraph(Request $request)
    {
        $by = $request->input('by', 'seller');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $data = match ($by) {
            'seller' => (function () use ($fromDate, $toDate) {
                return Invitation::select('seller_id', DB::raw('count(*) as total'))
                    ->when($fromDate, fn($query) => $query->whereDate('created_at', '>=', $fromDate))
                    ->when($toDate, fn($query) => $query->whereDate('created_at', '<=', $toDate))
                    ->with('seller:id,name')
                    ->groupBy('seller_id')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'seller_id' => $item->seller_id,
                            'seller_name' => $item->seller->name ?? 'Sin nombre',
                            'label' => $item->seller->name ?? 'Sin nombre',
                            'total' => $item->total,
                        ];
                    });
            })(),

            'plan' => (function () use ($fromDate, $toDate) {
                return Invitation::select('events.plan', 'events.plan as label', DB::raw('count(*) as total'))
                    ->join('events', 'invitations.event_id', '=', 'events.id')
                    ->when($fromDate, fn($query) => $query->whereDate('invitations.created_at', '>=', $fromDate))
                    ->when($toDate, fn($query) => $query->whereDate('invitations.created_at', '<=', $toDate))
                    ->groupBy('events.plan')
                    ->get();
            })(),

            'creator' => (function () use ($fromDate, $toDate) {
                return Invitation::select('created_by', DB::raw('count(*) as total'))
                    ->when($fromDate, fn($query) => $query->whereDate('created_at', '>=', $fromDate))
                    ->when($toDate, fn($query) => $query->whereDate('created_at', '<=', $toDate))
                    ->with('createdBy:id,name')
                    ->groupBy('created_by')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'created_by' => $item->created_by,
                            'creator_name' => $item->createdBy->name ?? 'Desconocido',
                            'label' => $item->createdBy->name ?? 'Desconocido',
                            'total' => $item->total,
                        ];
                    });
            })(),
        };

        return response()->json($data);
    }

    public function countryInvitationsGraph(Request $request){
        $country = $request->input('country', null);
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $query = Invitation::query()
            ->select(DB::raw("CONCAT(country_divisions.state_name, ' (', countries.name ,')') as label"), DB::raw("COUNT(invitations.id) as total"))
            ->when($fromDate, fn($query) => $query->whereDate('invitations.created_at', '>=', $fromDate))
            ->when($toDate, fn($query) => $query->whereDate('invitations.created_at', '<=', $toDate))
            ->join('events', 'invitations.event_id', '=', 'events.id')
            ->join('countries', 'events.country_id', '=', 'countries.id')
            ->join('country_divisions', 'events.country_division_id', '=', 'country_divisions.id')
            ->groupBy('country_divisions.state_name', 'countries.name')
            ->orderByDesc('total');

        if ($country) {
            $query->where('countries.code', $country);
        }

        $data = $query->get();

        return response()->json($data);
    }

    public function activeInvitationsGraph(){
        $data = Invitation::selectRaw("
                COUNT(*) as total
            ")
            ->where('active', 1)
            ->first();

        return response()->json($data);
    }
}
