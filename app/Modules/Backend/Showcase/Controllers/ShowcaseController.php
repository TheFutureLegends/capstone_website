<?php
namespace App\Modules\Backend\Showcase\Controllers;

// use App\Exports\LecturerExport;
// use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Showcase\Repositories\ShowcaseRepositoryInterface;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ShowcaseController extends Controller
{
    private $showcaseRepository;

    public function __construct(ShowcaseRepositoryInterface $showcaseRepository)
    {
        // $this->middleware(['auth', 'permission:view-lecturer|create-lecturer|update-lecturer|delete-lecturer']);

        $this->showcaseRepository = $showcaseRepository;
    }

    public function dataTables()
    {
        $showcases = $this->showcaseRepository->getPersonalShowcase(['title', 'slug', 'content', 'group_name']);

        return DataTables::of($showcases)
            ->addColumn('title', function ($showcase) {
                return $showcase->title;
            })
            ->addcolumn('content', function ($showcase) {
                $content = html_entity_decode(htmlspecialchars(strip_tags($showcase->content)));

                return split_sentence(str_replace("&nbsp;", ' ', $content), 100, '...');
            })
            ->addColumn('group', function ($showcase) {
                return $showcase->group_name;
            })
            ->addColumn('action', function ($showcase) {
                return '<a href="' . url()->previous() . '/edit/' . $showcase->slug . '" class="btn btn-info showcase-edit" data-toggle="tooltip" title="Edit" data-placement="top">Edit</a>
                    <a href="#" data-slug="' . $showcase->slug . '" class="btn btn-danger showcase-remove" data-toggle="tooltip" title="Remove" data-placement="top">Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
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
        $array = $request->all();

        $array['author'] = Auth::id();

        $this->showcaseRepository->create($array);

        return redirect()->route('showcase.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $showcase = $this->showcaseRepository->findBySlug($slug);

        return view('Showcase::form')->with([
            'showcase' => $showcase
        ]);
    }

    public function update($slug, Request $request)
    {
        $this->showcaseRepository->update($slug, $request->all());

        return redirect()->route('showcase.index');
    }

    public function destroy($slug)
    {
        $this->showcaseRepository->destroy($slug);

        return response()->json(['status' => 200, 'message' => "Delete Successfully!"]);
    }
}
