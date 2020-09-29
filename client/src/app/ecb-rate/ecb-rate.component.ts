import { Component, OnInit } from '@angular/core';
import { EcbRate, EcbRateService } from '../ecb-rate.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-ecb-rate',
  templateUrl: './ecb-rate.component.html',
  styleUrls: ['./ecb-rate.component.css']
})
export class EcbRateComponent implements OnInit {

  ecbRate: EcbRate;

  constructor(private ecbRateService: EcbRateService, private route: ActivatedRoute) { }

  ngOnInit(): void {
    this.getRate(this.route.snapshot.paramMap.get('id'));
  }

  getRate(id): void {
    this.ecbRateService.getById(id).subscribe(
      data => this.ecbRate = data.data,
      error => console.log(error)
    );
  }

}
