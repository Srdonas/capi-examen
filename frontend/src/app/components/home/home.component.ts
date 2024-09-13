import { Component } from '@angular/core';
import { RouterModule } from '@angular/router'; // Import RouterModule for routerLink

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [RouterModule], // Add RouterModule here to use routerLink
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent {
  title = 'Welcome to the Contact Management System';
}
