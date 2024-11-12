import { Injectable, Renderer2, RendererFactory2 } from '@angular/core';
import { ThemeService } from './theme.service';

@Injectable({
  providedIn: 'root',
})
export class StylingService {
  private renderer: Renderer2;

  constructor(
    private themeService: ThemeService,
    rendererFactory: RendererFactory2
  ) {
    this.renderer = rendererFactory.createRenderer(null, null);
  }

  renderPlaceholder(
    parentElement: HTMLElement,
    width: number = 600,
    height: number = 600,
    backgroundColor: string = 'black',
    textColor: string = 'white',
    fontSize: number = 24
  ): void {
    const placeholder = this.renderer.createElement('div');

    this.renderer.setStyle(placeholder, 'background-color', backgroundColor);
    this.renderer.setStyle(placeholder, 'color', textColor);
    this.renderer.setStyle(placeholder, 'display', 'flex');
    this.renderer.setStyle(placeholder, 'align-items', 'center');
    this.renderer.setStyle(placeholder, 'justify-content', 'center');
    this.renderer.setStyle(placeholder, 'flex-direction', 'column');
    this.renderer.setStyle(placeholder, 'width', `${width}px`);
    this.renderer.setStyle(placeholder, 'height', `${height}px`);
    this.renderer.setStyle(placeholder, 'font-size', `${fontSize}px`);
    this.renderer.setStyle(placeholder, 'position', 'relative');

    const textNode = this.renderer.createText(`${width}x${height}`);
    this.renderer.appendChild(placeholder, textNode);

    const themeButton = this.renderer.createElement('button');
    this.renderer.setStyle(themeButton, 'position', 'absolute');
    this.renderer.setStyle(themeButton, 'bottom', '10px');
    this.renderer.setStyle(themeButton, 'padding', '5px 10px');
    this.renderer.setStyle(themeButton, 'background-color', 'gray');
    this.renderer.setStyle(themeButton, 'color', 'white');
    this.renderer.setStyle(themeButton, 'border', 'none');
    this.renderer.setStyle(themeButton, 'cursor', 'pointer');
    this.renderer.setStyle(themeButton, 'font-size', '16px');

    const buttonText = this.renderer.createText('Switch Theme');
    this.renderer.appendChild(themeButton, buttonText);

    this.renderer.listen(themeButton, 'click', () => {
      const newTheme =
        this.themeService.theme === 'default' ? 'dark' : 'default';
      this.themeService.setTheme(newTheme);
    });

    this.renderer.appendChild(placeholder, themeButton);

    this.renderer.appendChild(parentElement, placeholder);
  }
}
