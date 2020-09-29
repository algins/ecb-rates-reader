import { TestBed } from '@angular/core/testing';

import { EcbRateService } from './ecb-rate.service';

describe('EcbRateService', () => {
  let service: EcbRateService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EcbRateService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
