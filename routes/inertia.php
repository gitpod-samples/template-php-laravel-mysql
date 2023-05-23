<?php

use App\Http\Controllers\Admin\AcademicProgramController as AdminAcademicProgramController;
use App\Http\Controllers\Admin\AcademicRankController as AdminAcademicRankController;
use App\Http\Controllers\Admin\AcademicYearController as AdminAcademicYearController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CollageController as AdminCollageController;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\EnrollmentTypeController as AdminEnrollmentTypeController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;

;
use App\Http\Controllers\Admin\LectureController as AdminLectureController;
use App\Http\Controllers\Admin\PrivacyController as AdminPrivacyController;
use App\Http\Controllers\Admin\PublicationController as AdminPublicationController;
use App\Http\Controllers\Admin\TermsController as AdminTermsController;
use App\Http\Controllers\Admin\TopicsController as AdminTopicsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserRoleController as AdminUserRoleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\UserAccountController;
use App\Http\Controllers\Settings\UserProfileController as SettingsUserProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Users\HomePageController as UsersHomePageController;
use Illuminate\Support\Facades\Route;

// Terms
Route::get('/privacy', function () {
    return inertia('Extra/Privacy');
})->name('privacy.index');
// Privacy
Route::get('/terms', function () {
    return inertia('Extra/Terms');
})->name('terms.index');
// Privacy
Route::get('/about', function () {
    return inertia('Extra/Terms');
})->name('about.index');
Route::get('/contact-us', function () {
    return inertia('Extra/Terms');
})->name('contact.index');
Route::get('/partners', function () {
    return inertia('Extra/Terms');
})->name('partners.index');
Route::get('/become-a-partners', function () {
    return inertia('Extra/Terms');
})->name('partners.register');
Route::get('/newsletters', function () {
    return inertia('Extra/Terms');
})->name('newsletters.index');

Route::middleware('auth')->prefix('bhudil')->group(function () {
    Route::get('/', [UsersHomePageController::class, 'index'])->name('home');
    //Profile
    Route::get('/@{user:username}', [UserProfileController::class, 'index'])->name('profile.index');
    // Admin
    Route::prefix('/admin')->name('admin.')->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        //Collage
        Route::resource('/collages', AdminCollageController::class);
        //Department
        Route::resource('/departments', AdminDepartmentController::class);
        //Users
        Route::resource('/users', AdminUserController::class);
        // User-types
        Route::resource('/user-types', AdminUserRoleController::class);
        // academic-ranks
        Route::resource('/academic-ranks', AdminAcademicRankController::class);
        // academic-years
        Route::resource('/academic-years', AdminAcademicYearController::class);
        //academic-programs
        Route::resource('/academic-programs', AdminAcademicProgramController::class);
        // enrollment-types
        Route::resource('/enrollment-types', AdminEnrollmentTypeController::class);
        // Publication
        Route::resource('/publications', AdminPublicationController::class);
        // Topics
        Route::resource('/topics', AdminTopicsController::class);
        // Forum
        Route::resource('/forums', AdminForumController::class);
        // Books
        Route::resource('/books', AdminBookController::class);
        // Lecture
        Route::resource('/lectures', AdminLectureController::class);
        // Privacy
        Route::resource('/privacy', AdminPrivacyController::class);
        // Terms
        Route::resource('/terms', AdminTermsController::class);
    });

    //Books

    Route::group(['prefix' => 'books'], function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/{book:slug}', [BookController::class, 'show'])->name('books.show');
        Route::get('/my-books', [BookController::class, 'myBooks'])->name('books.my_books');
    });

    // Settings
    Route::prefix('/settings')->name('setting.')->group(function () {
        Route::get('/', function () {
            return redirect('bhudil/settings/account');
        });

        Route::get('/account', [UserAccountController::class, 'index'])->name('account');
        Route::patch('/account', [UserAccountController::class, 'update'])->name('account.update');
        Route::delete('/account', [UserAccountController::class, 'destroy'])->name('account.destroy');

        Route::get('/profile', [SettingsUserProfileController::class, 'index'])->name('profile');
        Route::patch('/profile', [SettingsUserProfileController::class, 'update'])->name('profile.update');

        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Route::get('/profile', function () {
        //     return inertia('Profile/Edit/Profile');
        // })->name('profile');
        Route::get('/notification', function () {
            return inertia('Profile/Edit/Notification');
        })->name('notification');
        Route::get('/status', function () {
            return inertia('Profile/Edit/Status');
        })->name('status');
        Route::get('/groups', function () {
            return inertia('Profile/Edit/Feeds');
        })->name('groups');
    });

    //Topics

    Route::group(['prefix' => 'browse'], function () {
        Route::get('/all', function () {
            return view('pages.profile.index');
        })->name('browse.all');
    });

    //Lecture

    Route::group(['prefix' => 'lectures'], function () {
        Route::get('/', function () {
            return view('pages.profile.index');
        })->name('lectures.index');
    });
    //Publications

    Route::group(['prefix' => 'publications'], function () {
        Route::get('/', function () {
            return view('pages.profile.index');
        })->name('publications.index');
    });

    //Groups

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', function () {
            return view('pages.profile.index');
        })->name('groups.index');
    });

    //Discussion

    Route::group(['prefix' => 'discuss'], function () {
        Route::get('/', function () {
            return view('pages.forum.index');
        })->name('discuss.index');
    });

    Route::get('/me', function () {
    })->name('myLibrary');
    Route::get('/me', function () {
    })->name('library.index');

    // ->where('username', '[a-zA-Z0-9@_\-]+');
});
