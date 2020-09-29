import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EcbRatesComponent } from './ecb-rates.component';

describe('EcbRatesComponent', () => {
  let component: EcbRatesComponent;
  let fixture: ComponentFixture<EcbRatesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EcbRatesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EcbRatesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
