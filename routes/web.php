Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/theme-settings', [ThemeSettingsController::class, 'getSettings']);
    Route::post('/admin/theme-settings', [ThemeSettingsController::class, 'updateSettings']);
});
