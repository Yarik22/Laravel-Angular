import { Routes } from '@angular/router';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { HomeComponent } from './home/home.component';
import { DebugComponent } from './debug/debug.component';

export const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  { path: '404', component: PageNotFoundComponent },
  { path: 'debug', component: DebugComponent },
  { path: '**', redirectTo: '404' },
];
