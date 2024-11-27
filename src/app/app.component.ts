import { Component, OnInit } from '@angular/core';
import { MatTableDataSource } from '@angular/material/table';
import { PageEvent } from '@angular/material/paginator';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatProgressBarModule } from '@angular/material/progress-bar';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatTableModule } from '@angular/material/table';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { faker } from '@faker-js/faker';
interface UserData {
  id: number;
  name: string;
  email: string;
}

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    MatTableModule,
    MatPaginatorModule,
    MatProgressBarModule,
    MatToolbarModule,
    MatButtonModule,
    CommonModule,
  ],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent implements OnInit {
  displayedColumns: string[] = ['id', 'name', 'email'];
  dataSource: MatTableDataSource<UserData> = new MatTableDataSource<UserData>();
  totalRecords = 100;
  pageSize = 15;
  isLoading = false;

  users: UserData[] = [];

  ngOnInit(): void {
    this.loadUsers(0, this.pageSize);
  }

  loadUsers(pageIndex: number, pageSize: number): void {
    this.isLoading = true;
    setTimeout(() => {
      const start = pageIndex * pageSize;
      const end = start + pageSize;

      this.users = Array.from({ length: pageSize }, (_, i) => ({
        id: start + i + 1,
        name: faker.person.firstName(),
        email: faker.internet.email(),
      }));

      this.dataSource.data = this.users;
      this.isLoading = false;
    }, 1000);
  }

  onPageChange(event: PageEvent): void {
    this.loadUsers(event.pageIndex, event.pageSize);
  }
}
