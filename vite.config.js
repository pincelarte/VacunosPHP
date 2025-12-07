// Dentro de vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // ✅ CORRECCIÓN FINAL: Rutas de entrada (Input) deben ser completas
            // desde la ubicación de este archivo (la raíz de VacunosPHP).
            input: [
                'src/resources/css/app.css',  // <-- Le dices dónde está CSS
                'src/resources/js/app.js',    // <-- Le dices dónde está JS
            ],
            refresh: true,
            
            // ✅ RUTA DE SALIDA: Le dice a Vite que ponga la carpeta 'build' dentro de 'src/public'
            publicDirectory: 'src/public',
        }),
    ],
    // ✅ OPCIONAL: Eliminar la base /src/ para evitar conflictos de rutas
    // Esto generalmente se maneja mejor en el lado de Nginx/Docker.
});