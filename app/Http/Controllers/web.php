            Route::get('/proveedores/list', [ProveedoresController::class, 'list'])->name('proveedores.list');
            Route::resource('categorias', CategoriaController::class);
            Route::resource('proveedores', ProveedoresController::class);

            Route::resource('usuarios', UsuarioController::class);

            Route::put('/proveedores/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
            Route::get('/api/categoria-info/{id}', [CategoriaController::class, 'getCategoriaInfo'])->name('api.categoria.info');
            Route::get('/proveedores-por-categoria/{id}', [CategoriaController::class, 'proveedoresPorCategoria']);

