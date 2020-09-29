import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

interface EcbRateHistory {
  id: number;
  currency: string;
  rate: number;
  date: string;
}

export interface EcbRate {
  id: number;
  currency: string;
  rate: number;
  date: string;
  history?: EcbRateHistory[];
}

const apiUrl = 'http://server:8000/api';

@Injectable({
  providedIn: 'root'
})
export class EcbRateService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<any> {
    return this.http.get(`${apiUrl}/ecb-rates`);
  }

  getById(id): Observable<any> {
    return this.http.get(`${apiUrl}/ecb-rates/${id}`);
  }

}
