import { Component, OnInit } from '@angular/core';
import { EcbRate, EcbRateService } from '../ecb-rate.service';

@Component({
  selector: 'app-ecb-rates',
  templateUrl: './ecb-rates.component.html',
  styleUrls: ['./ecb-rates.component.css']
})
export class EcbRatesComponent implements OnInit {

  ecbRates: EcbRate[];
  updatedAt: string;
  page = 1;
  pageSize = 10;

  constructor(private ecbRateService: EcbRateService) { }

  ngOnInit(): void {
    this.getRates();
  }

  getRates(): void {
    this.ecbRateService.getAll().subscribe(
      data => {
        this.ecbRates = data.data;
        this.updatedAt = data.data[0]?.date;
      },
      error => console.log(error)
    );
  }

}
