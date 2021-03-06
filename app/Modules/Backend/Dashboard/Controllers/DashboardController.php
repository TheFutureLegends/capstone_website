<?php
namespace App\Modules\Backend\Dashboard\Controllers;

// use App\Dashboard\Lecturer\Model\Lecturer;
// use App\Exports\LecturerExport;
// use Carbon\Carbon;
// use Faker\Factory;
// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use Maatwebsite\Excel\Facades\Excel;
// use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:dashboard.access']);
    }

    public function dataTable_language()
    {
        $array = array(
            'search' => "_INPUT_",
            // 'sSearch'=> "Suchen",
            'sSearchPlaceholder' => __('dataTables.sSearchPlaceholder'),
            'sInfoThousands' => ".",
            'sLengthMenu' => __('dataTables.sLengthMenu'),
            'sEmptyTable' => __('dataTables.sEmptyTable'),
            'sProcessing' => __('dataTables.sProcessing'),
            'sLoadingRecords' => __('dataTables.sLoadingRecords'),
            'sZeroRecords' => __('dataTables.sZeroRecords'),
            'sInfo' => __('dataTables.sInfo'),
            'sInfoFiltered' => __('dataTables.sInfoFiltered'),
            'sInfoEmpty' => __('dataTables.sInfoEmpty'),
            'oPaginate' => [
                'sFirst' => __('dataTables.sFirst'),
                'sPrevious' => __('dataTables.sPrevious'),
                'sNext' => __('dataTables.sNext'),
                'sLast' => __('dataTables.sLast'),
            ],
        );

        return response()->json($array);

        // sInfoPostFix: "",
        // oAria: {
        //     sSortAscending: ": aktivieren, um Spalte aufsteigend zu sortieren",
        //     sSortDescending: ": aktivieren, um Spalte absteigend zu sortieren"
        // }
    }

    public function index()
    {
        return view('Dashboard::index');
    }

    // public function store(Request $request)
    // {
    //     $validator = \Validator::make($request->all(), [
    //         'first_name' => 'required|min:3|string',
    //         'last_name' => 'required|min:3|string',
    //         'age' => 'required|numeric|between:20,100',
    //         'gender' => 'required',
    //     ]);

    //     // Validate the input and return correct response
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()->all()]);
    //     }

    //     if ($request->input('gender') == 'M' || $request->input('gender') == 'F') {
    //         Lecturer::create([
    //             'first_name' => $request->input('first_name'),
    //             'last_name' => $request->input('last_name'),
    //             'age' => $request->input('age'),
    //             'gender' => $request->input('gender'),
    //         ]);
    //         return response()->json(['success' => 'Success']);
    //     } else {
    //         return response()->json(['message' => 'Please do not try to modify source code!']);
    //     }
    // }

    // public function edit(Request $request)
    // {
    //     $id = $request->input('id');

    //     $lecturer = Lecturer::find($request->input('id'));

    //     if ($lecturer == null) {
    //         return response()->json(['message' => 'No lecturer found!']);
    //     }

    //     return response()->json(['data' => $lecturer]);
    // }

    // public function update(Request $request)
    // {
    //     $validator = \Validator::make($request->all(), [
    //         'first_name' => 'required|min:3|string',
    //         'last_name' => 'required|min:3|string',
    //         'age' => 'required|numeric|between:20,100',
    //         'gender' => 'required',
    //     ]);

    //     // Validate the input and return correct response
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()->all()]);
    //     }

    //     $lecturer = Lecturer::find($request->input('id'));

    //     if ($lecturer == null) {
    //         return response()->json(['message' => 'Data not found!']);
    //     }

    //     if ($request->input('gender') == 'M' || $request->input('gender') == 'F') {

    //         $lecturer->first_name = $request->input('first_name');
    //         $lecturer->last_name = $request->input('last_name');
    //         $lecturer->age = $request->input('age');
    //         $lecturer->gender = $request->input('gender');

    //         $lecturer->save();

    //         return response()->json(['success' => 'Success']);
    //     } else {
    //         return response()->json(['message' => 'Please do not try to modify source code!']);
    //     }
    // }

    // public function export()
    // {
    //     Excel::store(new LecturerExport(), 'lecturers.csv', 'gcs');
    //     return new LecturerExport();
    // }

    // public function seedingLecturer(Request $request)
    // {
    //     $faker = Factory::create();

    //     foreach (range(1, $request->input('data')) as $i) {
    //         Lecturer::create([
    //             // 'id' => \Webpatser\Uuid\Uuid::generate(4),
    //             'first_name' => $faker->firstName,
    //             'last_name' => $faker->lastName,
    //             'gender' => $faker->randomElement(['M', 'F']),
    //             'age' => $faker->numberBetween($min = 25, $max = 50),
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return response()->json(['success' => 'Success']);
    // }

    // public function delete(Request $request)
    // {
    //     $lecturer = Lecturer::find($request->input('id'));

    //     if ($lecturer == null) {
    //         return response()->json(['message' => 'Data not found!']);
    //     }

    //     $lecturer->delete();

    //     return response()->json(['success' => 'Success']);
    // }
}
