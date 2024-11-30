import { Component, OnInit } from '@angular/core';
import { Product, ProductService } from './product.service';
import { CommonModule } from '@angular/common';
import { ProductFormComponent } from '../product-form/product-form.component';

@Component({
  selector: 'app-products',
  imports: [CommonModule, ProductFormComponent],
  standalone: true,
  template: `
    <h2>Product List</h2>
    <button (click)="reload()">Reload</button>
    <button (click)="create()">Create Product</button>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr *ngFor="let product of products">
          <td>{{ product.name }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.category }}</td>
          <td>{{ product.status }}</td>
          <td>
            <button (click)="edit(product)">Edit</button>
            <button (click)="delete(product.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <app-product-form
      *ngIf="selectedProduct || creating"
      [product]="selectedProduct"
      (saved)="onSaved($event)"
      (cancel)="onCancel()"
    ></app-product-form>
  `,
  styleUrls: ['./products.component.css'],
})
export class ProductsComponent implements OnInit {
  products: Product[] = [];
  selectedProduct: Product | null = null;
  creating = false;

  constructor(private productService: ProductService) {}

  ngOnInit() {
    this.loadProducts();
  }

  loadProducts() {
    this.productService
      .getProducts()
      .subscribe((data) => (this.products = data));
  }

  reload() {
    this.loadProducts();
  }

  create() {
    this.selectedProduct = null;
    this.creating = true;
  }

  edit(product: Product) {
    this.selectedProduct = { ...product };
    this.creating = false;
  }

  delete(id: number | undefined) {
    if (id && confirm('Are you sure?')) {
      this.productService
        .deleteProduct(id)
        .subscribe(() => this.loadProducts());
    }
  }

  onSaved(product: Product) {
    this.creating = false;
    this.selectedProduct = null;
    this.loadProducts();
  }

  onCancel() {
    this.creating = false;
    this.selectedProduct = null;
  }
}
