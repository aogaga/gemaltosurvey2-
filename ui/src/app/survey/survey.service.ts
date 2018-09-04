import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Answer} from '../model/answer';


@Injectable({
  providedIn: 'root'
})
export class SurveyService {
  API_URL  =  'http://localhost:8000';

  constructor(private http: HttpClient) {

  }
   getAnswers(): Observable<Answer[]> {
    return this.http.get<Answer[]>(this.API_URL);
  }

  sendAnswer(answer: any): Observable<Answer[]> {
    return this.http.post<Answer[]>(this.API_URL, answer);
  }

}
