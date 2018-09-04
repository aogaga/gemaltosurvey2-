import { Component, OnInit } from '@angular/core';
import {SurveyService} from './survey.service';
import {Answer} from '../model/answer';
import {FormControl, FormGroup, ReactiveFormsModule, FormsModule, Validators} from '@angular/forms';

@Component({
  selector: 'app-survey',
  templateUrl: './survey.component.html',
  styleUrls: ['./survey.component.css']
})
export class SurveyComponent implements OnInit {

  surveyForm = new FormGroup({
    dateOfBirth: new FormControl('', [Validators.required])
  });
   answers: Answer [] ;

  constructor( private surveyService: SurveyService) { }

  ngOnInit() {
    this.surveyService.getAnswers().subscribe(res => {
     this.answers = res;
     console.log(this.answers);
    });
  }


  onSubmit() {
    this.surveyService.sendAnswer({ 'answer': this.surveyForm.value.dateOfBirth}).subscribe(res => {

      if( res != null) {
        this.answers = res;
      }
      this.surveyForm.reset();
    });
  }


}
