
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { BrowserModule } from '@angular/platform-browser';

//Mis componentes
import { ContactListComponent } from './components/contact-list/contact-list.component';
import { ContactFormComponent } from './components/contact-form/contact-form.component';
import { ContactDetailComponent } from './components/contact-detail/contact-detail.component';
import { HomeComponent } from './components/home/home.component'; // Import the HomeComponent



export const routes: Routes = [
  { path: '', component: HomeComponent }, // Home page as the default route
  { path: 'contactos', component: ContactListComponent },
  { path: 'contactos/nuevo', component: ContactFormComponent }, // New contact form
  { path: 'contactos/:id', component: ContactDetailComponent },
  { path: 'contactos/editar/:id', component: ContactFormComponent }, // Edit contact form (with dynamic ID)
  { path: 'contactos/detalles/:id', component: ContactDetailComponent }, // Contact details route
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes),
    BrowserModule, // Make sure BrowserModule is imported
  ],
  exports: [
    RouterModule
  ],
})
export class AppRoutingModule {}
