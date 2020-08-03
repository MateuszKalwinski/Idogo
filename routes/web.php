<?php

Route::get('/','FrontendController@index')->name('home');


Route::get(trans('routes.animals').'/{id?}','AnimalsController@animals')->name('animals');
Route::get(trans('routes.searchAnimals'), 'AnimalsController@searchAnimals')->name('searchAnimals');
Route::post('/getAnimalSpecies', 'FrontendController@getAnimalSpecies')->name('getAnimalSpecies');
Route::get(trans('routes.animal').'/{id}','AnimalController@animal')->name('animal');

Route::post('/sendReport', 'FrontendController@sendReport')->name('sendReport');


Route::get(trans('routes.breeds'),'BreedsController@breeds')->name('breeds');
Route::get(trans('routes.searchBreeds'), 'BreedsController@searchBreeds')->name('searchBreeds');


Route::get(trans('routes.breedDescription').'/{id}','AnimalsController@breedDescription')->name('breedDescription');

Route::get('/searchCities', 'FrontendController@searchCities');

Route::post('/getPhoneNumbers', 'FrontendController@getPhoneNumbers')->name('getPhoneNumbers');

Route::post('/favouriteAnimal', 'FrontendController@favouriteAnimal')->name('favouriteAnimal');
Route::post('/notFavouriteAnimal', 'FrontendController@notFavouriteAnimal')->name('notFavouriteAnimal');

Route::post('/favouriteShelter', 'FrontendController@favouriteShelter')->name('favouriteShelter');
Route::post('/notFavouriteShelter', 'FrontendController@notFavouriteShelter')->name('notFavouriteShelter');


Route::get(trans('routes.shelter').'/{id}','ShelterController@shelter')->name('shelter');
Route::get(trans('routes.shelters'),'SheltersController@shelters')->name('shelters');
Route::get(trans('routes.searchShelters'), 'SheltersController@searchShelters')->name('searchShelters');


Route::get(trans('routes.user').'/{id}','FrontendController@user')->name('user');


Route::get(trans('routes.city').'/{id}','FrontendController@city')->name('city');
Route::get(trans('routes.province').'/{id}','FrontendController@province')->name('province');


Route::get(trans('routes.joinShelter'), 'FrontendController@joinShelter')->name('joinShelter');
Route::post('joinShelterForm', 'FrontendController@joinShelterForm')->name('joinShelterForm');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    //for json mobile
    Route::get('/getNotifications', 'BackendController@getNotifications');
    Route::post('/setReadNotifications', 'BackendController@setReadNotifications');

    Route::get('/','BackendController@index')->name('adminHome');


    Route::get('/favourite', 'BackendController@favourite')->name('favourite');

    Route::get('/adminUsers', 'AdminController@adminUsers')->name('adminUsers');

    Route::get('/adminShelterApplication', 'AdminController@adminShelterApplication')->name('adminShelterApplication');

    Route::post('/savePhoneNumber', 'BackendController@savePhoneNumber')->name('savePhoneNumber');
    Route::post('/deletePhoneNumber', 'BackendController@deletePhoneNumber')->name('deletePhoneNumber');


    Route::get('/adminSpecies', 'AdminController@adminSpecies')->name('adminSpecies');
    Route::post('/adminStoreAnimalSpecies', 'AdminController@adminStoreAnimalSpecies')->name('adminStoreAnimalSpecies');
    Route::post('/adminUpdateAnimalSpecies', 'AdminController@adminUpdateAnimalSpecies')->name('adminUpdateAnimalSpecies');
    Route::post('/deleteAnimalSpecies', 'AdminController@deleteAnimalSpecies')->name('deleteAnimalSpecies');
    Route::post('/restoreAnimalSpecies', 'AdminController@restoreAnimalSpecies')->name('restoreAnimalSpecies');


    Route::get('/adminSpeciesWithGender', 'AdminController@adminSpeciesWithGender')->name('adminSpeciesWithGender');

    Route::get('/adminBreeds', 'AdminController@adminBreeds')->name('adminBreeds');

    Route::get('/adminAnimals', 'AdminController@adminAnimals')->name('adminAnimals');


    Route::get('/adminAnimalCharacteristics', 'AdminController@adminAnimalCharacteristics')->name('adminAnimalCharacteristics');
    Route::post('/adminStoreAnimalCharacteristic', 'AdminController@adminStoreAnimalCharacteristic')->name('adminStoreAnimalCharacteristic');
    Route::post('/adminUpdateAnimalCharacteristic', 'AdminController@adminUpdateAnimalCharacteristic')->name('adminUpdateAnimalCharacteristic');
    Route::post('/deleteAnimalCharacteristic', 'AdminController@deleteAnimalCharacteristic')->name('deleteAnimalCharacteristic');
    Route::post('/restoreAnimalCharacteristic', 'AdminController@restoreAnimalCharacteristic')->name('restoreAnimalCharacteristic');


    Route::get('/adminAnimalColors', 'AdminController@adminAnimalColors')->name('adminAnimalColors');
    Route::post('/adminStoreAnimalColor', 'AdminController@adminStoreAnimalColor')->name('adminStoreAnimalColor');
    Route::post('/adminUpdateAnimalColor', 'AdminController@adminUpdateAnimalColor')->name('adminUpdateAnimalColor');
    Route::post('/deleteAnimalColor', 'AdminController@deleteAnimalColor')->name('deleteAnimalColor');
    Route::post('/restoreAnimalColor', 'AdminController@restoreAnimalColor')->name('restoreAnimalColor');

    /*
     * SIMPLE LIST DATA ROUTES - TRAITS ACTIONS
     * */
    Route::post('/getBreeds', 'AdminController@getBreeds')->name('getBreeds');
    Route::post('/getColors', 'AdminController@getColors')->name('getColors');
    Route::post('/getFurs', 'AdminController@getFurs')->name('getFurs');


    Route::get('/adminAvailableColors', 'AdminController@adminAvailableColors')->name('adminAvailableColors');
    Route::post('/getAvailableColorsForBreed', 'AdminController@getAvailableColorsForBreed')->name('getAvailableColorsForBreed');
    Route::post('/adminStoreAvailableColors', 'AdminController@adminStoreAvailableColors')->name('adminStoreAvailableColors');
    Route::post('/adminUpdateAvailAbleColors', 'AdminController@adminUpdateAvailAbleColors')->name('adminUpdateAvailAbleColors');
    Route::post('/deleteAvailableColor', 'AdminController@deleteAvailableColor')->name('deleteAvailableColor');

    Route::get('/adminAvailableFurs', 'AdminController@adminAvailableFurs')->name('adminAvailableFurs');


    Route::get('/adminAnimalFur', 'AdminController@adminAnimalFur')->name('adminAnimalFur');
    Route::post('/adminStoreAnimalFur', 'AdminController@adminStoreAnimalFur')->name('adminStoreAnimalFur');
    Route::post('/adminUpdateAnimalFur', 'AdminController@adminUpdateAnimalFur')->name('adminUpdateAnimalFur');
    Route::post('/deleteRestoreAnimalFur', 'AdminController@deleteRestoreAnimalFur')->name('deleteRestoreAnimalFur');


    Route::get('/adminAnimalSize', 'AdminController@adminAnimalSize')->name('adminAnimalSize');
    Route::post('/adminStoreAnimalSize', 'AdminController@adminStoreAnimalSize')->name('adminStoreAnimalSize');
    Route::post('/adminUpdateAnimalSize', 'AdminController@adminUpdateAnimalSize')->name('adminUpdateAnimalSize');
    Route::post('/deleteAnimalSize', 'AdminController@deleteAnimalSize')->name('deleteAnimalSize');
    Route::post('/restoreAnimalSize', 'AdminController@restoreAnimalSize')->name('restoreAnimalSize');



    Route::get('/adminViolationReports', 'AdminController@adminViolationReports')->name('adminViolationReports');

    Route::match(['GET','POST'],trans('routes.profile'),'BackendController@profile')->name('profile');
    Route::get('/deletePhoto/{id}', 'BackendController@deletePhoto')->name('deletePhoto');




    Route::resource('cities', 'CityController');





});

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');
