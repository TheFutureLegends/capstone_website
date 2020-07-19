<?php
namespace App\Modules\Backend\Showcase\Controllers;

// use App\Dashboard\Lecturer\Model\Lecturer;
// use App\Exports\LecturerExport;
// use Carbon\Carbon;
// use Faker\Factory;
use Illuminate\Http\Request;
use App\Modules\Backend\Showcase\Repositories\ShowcaseRepositoryInterface;
// use Illuminate\Support\Str;
// use Maatwebsite\Excel\Facades\Excel;
// use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ShowcaseController extends Controller
{
    private $showcaseRepository;

    public function __construct(ShowcaseRepositoryInterface $showcaseRepository)
    {
        // $this->middleware(['auth', 'permission:view-lecturer|create-lecturer|update-lecturer|delete-lecturer']);

        $this->showcaseRepository = $showcaseRepository;
    }

    public function index()
    {
        return view('Showcase::index');
    }

    public function create()
    {
        return view('Showcase::form');
    }
    
    public function store(Request $request)
    {
        dd($request->all());

        $array = $request->all();

        // $array['author'] = Auth::id();

        $this->showcaseRepository->create($array);

        return redirect()->route('showcase.index');
    }
}
