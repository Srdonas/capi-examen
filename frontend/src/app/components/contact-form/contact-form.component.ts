import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ContactService } from '../../services/contact.service';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms'; // Import FormsModule to use ngModel

@Component({
  selector: 'app-contact-form',
  standalone: true,
  imports: [
    CommonModule,   // Import CommonModule
    RouterModule,   // Import RouterModule for routerLink
    FormsModule     // Import FormsModule for ngModel
  ],
  templateUrl: './contact-form.component.html',
  styleUrls: ['./contact-form.component.css'],

})
export class ContactFormComponent implements OnInit {
  contact: any = { nombre: '', notas: '', fecha_nacimiento: '', pagina_web: '', empresa: '' };
  isEditMode: boolean = false;
  contactId!: number;

  constructor(private contactService: ContactService, private route: ActivatedRoute, private router: Router) {}

  ngOnInit(): void {
    this.contactId = this.route.snapshot.params['id'];
    if (this.contactId) {
      this.isEditMode = true;
      this.contactService.getContact(this.contactId).subscribe((data) => {
        this.contact = data;
      });
    }
  }

  saveContact() {
    if (this.isEditMode) {
      this.contactService.updateContact(this.contactId, this.contact).subscribe(() => {
        this.router.navigate(['/contactos']);
      });
    } else {
      this.contactService.createContact(this.contact).subscribe(() => {
        this.router.navigate(['/contactos']);
      });
    }
  }

  cancel() {
    this.router.navigate(['/contactos']);
  }
}
