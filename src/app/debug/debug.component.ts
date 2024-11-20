import { AfterViewInit, Component, ElementRef, OnInit } from '@angular/core';
import { StylingService } from '../services/styling.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-debug',
  standalone: true,
  imports: [],
  templateUrl: './debug.component.html',
  styleUrls: ['./debug.component.scss'],
})
export class DebugComponent implements AfterViewInit, OnInit {
  textColor?: string;
  textFont?: number;
  divColor?: string;
  divWidth?: number;
  divHeight?: number;
  constructor(
    private stylingService: StylingService,
    private el: ElementRef,
    private route: ActivatedRoute
  ) {}
  ngOnInit(): void {
    this.route.queryParams.subscribe((params) => {
      this.textColor = params['bg'];
      this.textFont = +params['font'];
      this.divColor = params['color'];
      this.divWidth = +params['width'];
      this.divHeight = +params['height'];
    });
  }

  ngAfterViewInit(): void {
    const container = this.el.nativeElement.querySelector(
      '#placeholderContainer'
    );
    if (container) {
      this.stylingService.renderPlaceholder(
        container,
        this.divWidth,
        this.divHeight,
        this.divColor,
        this.textColor,
        this.textFont
      );
    }
  }
}
