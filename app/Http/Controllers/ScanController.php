<?php

namespace App\Http\Controllers;

use App\Domain\Namp;
use App\Domain\Nikto;
use App\Models\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ScanController extends Controller
{
    public function index()
    {
        $scans = Scan::where('user_id', Auth::id())->paginate(15);

        return Inertia::render('Scans/Index', compact('scans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $scan = Scan::create([
            'user_id' => Auth::id(),
            'url' => $request->url,
            'started_at' => now(),
        ]);

        $nmapScanner = new Namp();

        $scan->output = $nmapScanner->scan($request->url);
        $scan->completed_at = now();
        $scan->save();

        return redirect()->route('scan.show', $scan);
    }

    public function show(Scan $scan)
    {
//        $xmlOutput = simplexml_load_string($scan->output);
//
//        $ports = $xmlOutput->host->ports->port;
//
//        $output = [];
//        foreach ($ports as $port) {
//            $output[] = [
//                'port' => (int) $port['portid'],
//                'state' => (string) $port->state['state'],
//                'service' => (string) $port->service['product'],
//                'version' => (string) $port->service['version'],
//                ];
//        }


        dd($scan->output);
    }
}
