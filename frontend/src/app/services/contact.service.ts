import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ContactService {
  private apiUrl = 'http://localhost:8000/api/contactos'; // Your API endpoint

  constructor(private http: HttpClient) {}

  // Fetch all contacts
  getContacts(page: number, perPage: number): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}?page=${page}&per_page=${perPage}`);
  }

  // Create a new contact
  createContact(contact: any): Observable<any> {
    return this.http.post(`${this.apiUrl}`, contact);
  }

  // Get a single contact
  getContact(contactId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${contactId}`);
  }

  // Update a contact
  updateContact(contactId: number, contact: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${contactId}`, contact);
  }

  // Delete a contact
  deleteContact(contactId: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${contactId}`);
  }
}
