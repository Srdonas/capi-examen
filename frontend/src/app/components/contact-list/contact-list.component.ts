import { Component, OnInit } from '@angular/core';
import { ContactService } from '../../services/contact.service';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router'; // Import RouterModule for routerLink

@Component({
  selector: 'app-contact-list',
  standalone: true,
  imports: [
    CommonModule, // Import CommonModule
    RouterModule  // Import RouterModule for routerLink
  ],
  templateUrl: './contact-list.component.html',
  styleUrls: ['./contact-list.component.css'],
})
export class ContactListComponent implements OnInit {
  contacts: any[] = [];
  currentPage: number = 1;
  totalPages: number = 1;  // Total pages will be calculated
  perPage: number = 4;     // The number of items per page (match with API)
  nextPageUrl: string | null = null;  // To store the next page URL
  prevPageUrl: string | null = null;  // To store the previous page URL

  constructor(private contactService: ContactService) {}

  ngOnInit(): void {
    this.loadContacts(this.currentPage);
  }

  // Load contacts based on the current page
  loadContacts(page: number): void {
    this.contactService.getContacts(page, this.perPage).subscribe(
      (response: any) => {
        console.log('API Response', response);  // Debugging log for API response

        this.contacts = response.data;             // Update contacts
        this.nextPageUrl = response.next_page_url; // Store next page URL
        this.prevPageUrl = response.prev_page_url; // Store previous page URL
        this.totalPages = Math.ceil(response.total / this.perPage);  // Calculate total pages
        this.currentPage = page;                   // Set current page
      },
      (error) => {
        console.error('Error fetching contacts', error);
      }
    );
  }

  // Navigate to the next page
  nextPage(): void {
    if (this.nextPageUrl) {
      this.loadContacts(this.currentPage + 1);
    } else {
      console.log('No more pages to navigate');
    }
  }

  // Navigate to the previous page
  previousPage(): void {
    if (this.prevPageUrl) {
      this.loadContacts(this.currentPage - 1);
    } else {
      console.log('Already on the first page');
    }
  }

  // Delete a contact (implement your logic here)
  deleteContact(contactId: number): void {
    this.contactService.deleteContact(contactId).subscribe(() => {
      // After deleting, reload the contacts for the current page
      this.loadContacts(this.currentPage);
    });
  }
}
