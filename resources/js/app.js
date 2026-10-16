import './bootstrap';


//quitado por error entre alpine y livewire
//import Alpine from 'alpinejs';

//window.Alpine = Alpine;

//Alpine.start();
// Si usas Livewire 3 y necesitas Alpine o plugins:
import { Alpine, Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm'; // O la forma estándar de tu versión
// Registras tus plugins aquí si los hay, EJ: Alpine.plugin(MiPlugin)
Livewire.start();
