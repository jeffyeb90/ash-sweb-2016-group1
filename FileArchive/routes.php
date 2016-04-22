<?php
Route::auth();

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
   
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();


    Route::get('/home', 'HomeController@index');
/*
    Route::resource('regions', 'RegionController');
    Route::get('listing1', 'SampleTableController@Listing1');
    Route::resource('sampletable', 'SampleTableController');
    Route::resource('districts', 'DistrictController');    
    */
    
//  Route::get('landingpage','HomeController@landingpage');

    Route::resource('agendaattachment', 'AgendaAttachmentController'); 
	Route::resource('agendaitem', 'AgendaItemController'); 
	Route::resource('agenda', 'AgendaController'); 
	Route::resource('alloweduser', 'AllowedUserController'); 
	Route::resource('approvaldecisionletter', 'ApprovalDecisionLetterController'); 
	Route::resource('approvalmemo', 'ApprovalMemoController'); 
	Route::resource('committeereport', 'CommitteeReportController'); 
	Route::resource('contractor', 'ContractorController'); 
	Route::resource('decisionletter', 'DecisionLetterController'); 
	Route::resource('decisionstatus', 'DecisionStatusController'); 
	Route::resource('decision', 'DecisionController'); 
	Route::resource('district', 'DistrictController'); 
	Route::resource('documentstatehistory', 'DocumentStateHistoryController'); 
	Route::resource('documenttype', 'DocumentTypeController'); 
	
//	Route::get('uploaddocument','DocumentController@uploadDocument');
//	Route::get('inbox','DocumentController@inbox');
//	Route::get('drafts','DocumentController@drafts');
//	Route::get('sent','DocumentController@sent');
//	Route::get('forward','DocumentController@forwardDocument');
////	Route::get('addcomments','DocumentController@addComments');  //will be don in DocumentStateHistory


	Route::resource('document', 'DocumentController'); 
	Route::resource('executiveapprovalmemo', 'ExecutiveApprovalMemoController'); 
	Route::resource('forwardingletter', 'ForwardingLetterController'); 
	Route::resource('fundingsource', 'FundingSourceController'); 
	Route::resource('meetingparticipant', 'MeetingParticipantController'); 
	Route::resource('meetingtype', 'MeetingTypeController'); 	
	
	//Route::get('createmeeting','MeetingController@createMeeting');
	Route::resource('meeting', 'MeetingController'); 
	Route::resource('memo', 'MemoController'); 
	Route::resource('minute', 'MinuteController'); 
	Route::resource('priority', 'PriorityController'); 
	Route::resource('projectreport', 'ProjectReportController'); 
	Route::resource('projectstatus', 'ProjectStatusController'); 
	Route::resource('projecttype', 'ProjectTypeController'); 
	Route::resource('project', 'ProjectController'); 
	Route::resource('recommendationstatus', 'RecommendationStatusController'); 
	Route::resource('region', 'RegionController'); 
	Route::resource('source', 'SourceController'); 
	Route::resource('workflownavigation', 'WorkflowNavigationController'); 
	Route::resource('workflowstate', 'WorkflowStateController'); 
	Route::resource('workflow', 'WorkflowController'); 
	Route::resource('userlevel', 'UserLevelController'); 
	

    
});


