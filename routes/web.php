use App\Http\Controllers\FolderController;

Route::middleware(['auth'])->group(function () {
    Route::resource('folders', FolderController::class)->only(['index', 'create', 'store', 'show']);
});