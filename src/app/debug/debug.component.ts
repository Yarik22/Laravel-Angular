import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { nameValidator, passwordStrengthValidator } from '../validators/custom-validators';

@Component({
  selector: 'app-debug',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './debug.component.html',
  styleUrls: ['./debug.component.scss'],
})
export class DebugComponent {
  registrationForm: FormGroup;

  constructor(private fb: FormBuilder) {
    this.registrationForm = this.fb.group({
      userInfo: this.fb.group({
        firstName: ['', [Validators.required, Validators.minLength(2), nameValidator()]],
        lastName: ['', [Validators.required, Validators.minLength(2), nameValidator()]],
      }),
      accountInfo: this.fb.group({
        email: ['', [Validators.required, Validators.email]],
        password: ['', [Validators.required, Validators.minLength(6), passwordStrengthValidator()]],
      }),
    });
  }

  updateForm() {
    this.registrationForm.setValue({
      userInfo: {
        firstName: 'Clem',
        lastName: 'Son',
      },
      accountInfo: {
        email: 'clem@example.com',
        password: 'C2110817',
      },
    });
  }

  get userInfo() {
    return this.registrationForm.get('userInfo') as FormGroup;
  }

  get accountInfo() {
    return this.registrationForm.get('accountInfo') as FormGroup;
  }

  //FormsModule
  // user = {
  //   firstName: '',
  //   lastName: '',
  //   email: '',
  //   password: ''
  // };

  // updateForm() {
  //   this.user = {
  //     firstName: 'Clem',
  //     lastName: 'Son',
  //     email: 'clem@example.com',
  //     password: '2110817',
  //   };
  // }
}
