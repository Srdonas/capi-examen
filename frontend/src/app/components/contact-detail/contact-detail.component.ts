import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ContactService } from '../../services/contact.service';
import { CommonModule } from '@angular/common'; // Import CommonModule
import { RouterModule } from '@angular/router'; // Import RouterModule for routerLink

@Component({
  selector: 'app-contact-detail',
  standalone: true,
  imports: [
    CommonModule, // Import CommonModule
    RouterModule // Import RouterModule to use routerLink
  ],
  templateUrl: './contact-detail.component.html',
  styleUrls: ['./contact-detail.component.css'],

})
export class ContactDetailComponent implements OnInit {
  contactId!: number;
  contact: any = {};

  constructor(private route: ActivatedRoute, private contactService: ContactService) {}

  ngOnInit(): void {
    this.contactId = this.route.snapshot.params['id'];
    this.contactService.getContact(this.contactId).subscribe((data) => {
      this.contact = data;
    });
  }
}
