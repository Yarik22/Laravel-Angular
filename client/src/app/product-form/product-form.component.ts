import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { Product, ProductService } from '../products/product.service';

@Component({
  selector: 'app-product-form',
  styleUrl:"./product-form.component.css",
  standalone: true,
  imports: [ReactiveFormsModule],
  template: `
    <h3>{{ product?.id ? 'Edit' : 'Add' }} Product</h3>
    <form [formGroup]="form" (ngSubmit)="save()">
      <label>
        Name:
        <input formControlName="name" />
      </label>
      <label>
        Price:
        <input formControlName="price" type="number" />
      </label>
      <label>
        Category:
        <input formControlName="category" />
      </label>
      <label>
        Status:
        <select formControlName="status">
          <option value="in stock">In Stock</option>
          <option value="out of stock">Out of Stock</option>
          <option value="running out">Running Out</option>
        </select>
      </label>
      <label>
        Description:
        <textarea formControlName="description"></textarea>
      </label>
      <button type="submit">Save</button>
      <button type="button" (click)="cancel.emit()">Cancel</button>
    </form>
  `,
})
export class ProductFormComponent {
  @Input() product: Product | null = null;
  @Output() saved = new EventEmitter<Product>();
  @Output() cancel = new EventEmitter<void>();

  form = new FormGroup({
    name: new FormControl('', { nonNullable: true }),
    price: new FormControl(0, { nonNullable: true }),
    category: new FormControl('', { nonNullable: true }),
    status: new FormControl('in stock', { nonNullable: true }),
    description: new FormControl(''),
  });

  constructor(private productService: ProductService) {}

  ngOnChanges() {
    if (this.product) {
      this.form.patchValue({
        ...this.product,
        description: this.product.description ?? '',
      });
    }
  }

  save() {
    const product: Product = {
      ...this.product,
      ...this.form.value,
      description: this.form.value.description || null,
    } as Product;

    if (product.id) {
      this.productService.updateProduct(product.id, product).subscribe(() => this.saved.emit(product));
    } else {
      this.productService.createProduct(product).subscribe((newProduct) => this.saved.emit(newProduct));
    }
  }
}
