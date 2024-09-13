import { bootstrapApplication } from '@angular/platform-browser';
import { AppComponent } from './app/app.component';
import { provideHttpClient } from '@angular/common/http'; // Provide HttpClient
import { provideRouter } from '@angular/router'; // Provide Router
import { routes } from './app/app.routes'; // Import your routes

bootstrapApplication(AppComponent, {
  providers: [
    provideRouter(routes), // Set up the router globally
    provideHttpClient(),   // Provide HttpClient globally
  ]
}).catch((err) => console.error(err));
