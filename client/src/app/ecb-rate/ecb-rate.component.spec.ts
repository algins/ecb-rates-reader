import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EcbRateComponent } from './ecb-rate.component';

describe('EcbRateComponent', () => {
  let component: EcbRateComponent;
  let fixture: ComponentFixture<EcbRateComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EcbRateComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EcbRateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
