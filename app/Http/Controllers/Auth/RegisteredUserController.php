<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Http\Resources\CountryApiResource;
use App\Http\Resources\UserRoleApiResorce;
use App\Models\AcademicProgram;
use App\Models\AcademicRank;
use App\Models\AcademicYear;
use App\Models\Collage;
use App\Models\Country;
use App\Models\Enrollment;
use App\Models\Genders;
use App\Models\User;
use App\Models\UsersDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        if (!Cache::has('gender_list')) {
            Cache::add('gender_list', UserRoleApiResorce::collection(Genders::all()), now()->addMonth());
        }
        if (!Cache::has('country_names')) {
            Cache::add('country_names', CountryApiResource::collection(Country::all()), now()->addDay());
        }
        if (!Cache::has('user_type_names')) {
            Cache::add('user_type_names', static::userTypes(), now()->addDay());
        }
        if (!Cache::has('user_role_for_registration')) {
            Cache::add('user_role_for_registration', UserRoleApiResorce::collection(Role::where('name', '<>', 'super_admin')->get()), now()->addDay());
        }
        if (!Cache::has('collage_lists')) {
            Cache::add('collage_lists', UserRoleApiResorce::collection(Collage::all()), now()->addDay());
        }
        if (!Cache::has('acadameic_ranks')) {
            Cache::add('acadameic_ranks', UserRoleApiResorce::collection(AcademicRank::all()), now()->addMonth());
        }
        if (!Cache::has('acadameic_programs')) {
            Cache::add('acadameic_programs', UserRoleApiResorce::collection(AcademicProgram::all()), now()->addMonth());
        }
        if (!Cache::has('acadameic_year')) {
            Cache::add('acadameic_year', UserRoleApiResorce::collection(AcademicYear::all()), now()->addMonth());
        }
        if (!Cache::has('acadameic_enrollment')) {
            Cache::add('acadameic_enrollment', UserRoleApiResorce::collection(Enrollment::all()), now()->addMonth());
        }

        $userType = Cache::get('user_role_for_registration');
        $academicRank= Cache::get('acadameic_ranks');
        $academicProgram= Cache::get('acadameic_programs');
        $academicYear= Cache::get('acadameic_year');
        $enrollment= Cache::get('acadameic_enrollment');
        $genderType = Cache::get('gender_list');
        $country = Cache::get('country_names');
        $collage = Cache::get('collage_lists');
        $userTypeNames= Cache::get('user_type_names');

        return Inertia::render('Auth/Register', compact('userType', 'genderType', 'country', 'collage', 'userTypeNames', 'academicRank', 'academicProgram', 'academicYear', 'enrollment'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRegistrationRequest $request): RedirectResponse
    {
        $user = $this->createUser($request->validated());

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public static function userTypes(): array
    {
        $userTypes = [];
        $student = Role::where('name', '=', 'student')->first();

        if ($student) {
            $userTypes['student'] = $student->id;
        } else {
            $userTypes['student'] = null;
        }

        $academicStaff = Role::where('name', '=', 'academic_staff')->first();

        if ($academicStaff) {
            $userTypes['acStaff'] = $academicStaff->id;
        } else {
            $userTypes['acStaff'] = null;
        }

        $adminStaff = Role::where('name', '=', 'administrative_staff')->first();

        if ($adminStaff) {
            $userTypes['adStaff'] = $adminStaff->id;
        } else {
            $userTypes['adStaff'] = null;
        }
        return $userTypes;
    }
    public function createUser(array $input)
    {
        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]), function (User $user) use ($input) {
                return tap(
                    $user->assignRole(Role::findById($input['user_type'])),
                    function (User $user) use ($input) {
                        $this->createDetail($user, $input);
                    }
                ) ;
            });
        });
    }

    protected function createDetail(User $user, array $input)
    {
        $input = array_merge($input, ['user_id' => $user['id']]);
        UsersDetail::create($input);
    }
}
