import { AfterViewInit, Component, ElementRef } from '@angular/core';
import { StylingService } from '../services/styling.service';

@Component({
  selector: 'app-debug',
  standalone: true,
  imports: [],
  templateUrl: './debug.component.html',
  styleUrls: ['./debug.component.scss'],
})
export class DebugComponent implements AfterViewInit {
  constructor(private stylingService: StylingService, private el: ElementRef) {}

  ngAfterViewInit(): void {
    const container = this.el.nativeElement.querySelector(
      '#placeholderContainer'
    );
    if (container) {
      this.stylingService.renderPlaceholder(
        container,
        1360,
        720,
        'black',
        'white',
        40
      );
    }
  }
}
