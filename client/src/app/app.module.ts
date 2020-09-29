import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { NgbModule} from '@ng-bootstrap/ng-bootstrap';
import { HttpClientModule } from '@angular/common/http';
import { Routes, RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { EcbRatesComponent } from './ecb-rates/ecb-rates.component';
import { EcbRateComponent } from './ecb-rate/ecb-rate.component';

const routes: Routes = [
    { path: '', redirectTo: 'ecb-rates', pathMatch: 'full' },
    { path: 'ecb-rates', component: EcbRatesComponent },
    { path: 'ecb-rates/:id', component: EcbRateComponent }
];

@NgModule({
  declarations: [
    AppComponent,
    EcbRatesComponent,
    EcbRateComponent
  ],
  imports: [
    BrowserModule,
    NgbModule,
    HttpClientModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
