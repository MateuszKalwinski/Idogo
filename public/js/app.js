$(document).ready(function(){!function(e){"frontendIndex"==e&&new frontendIndex(base_url);"frontendAnimals"==e&&new frontendAnimals(base_url);"frontendAnimal"==e&&new frontendAnimal(base_url);"frontendShelter"==e&&new frontendShelter(base_url);"frontendShelters"==e&&new frontendShelters(base_url);"frontendUser"==e&&new frontendUser(base_url);"backendProfile"==e&&new backendProfile(base_url);"backendAnimalColors"==e&&new BackendAnimalColors(base_url);"backendAnimalCharacteristics"==e&&new backendAnimalCharacteristics(base_url);"backendAnimalSpecies"==e&&new BackendAnimalSpecies(base_url);"backendAnimalFurs"==e&&new BackendAnimalFurs(base_url);"backendAnimalSizes"==e&&new BackendAnimalSizes(base_url);"backendAvailableColors"==e&&new BackendAvailableColors(base_url)}($("#ModuleName").attr("data-moduleName")),$(".mdb-select").materialSelect({labels:{selectAll:"Wybierz wszystkie",optionsSelected:"wybranych opcji",noSearchResults:"Brak wyników"}}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(document).on("click",".favouriteAnimal",function(){!function(e){let r=e.attr("data-animal-id");$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({type:"POST",url:base_url+"/favouriteAnimal",data:{animalId:r},dataType:"json",beforeSend:function(){e.prop("disabled",!0)},success:function(r){if(r.original){if(r.original.errors){var a="";jQuery.each(r.original.errors,function(e,r){a+=r+"<br>"}),(new Errors).showErrorModal(a)}}else r.errors?(new Errors).showErrorModal(r.errors.global):(e.removeClass("favouriteAnimal").addClass("notfavouriteAnimal"),e.children().removeClass("text-white text-muted").addClass("pink-text"))},complete:function(){e.prop("disabled",!1)},error:function(e){}})}($(this))}),$(document).on("click",".notfavouriteAnimal",function(){!function(e){let r=e.attr("data-animal-id");$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({type:"POST",url:base_url+"/notFavouriteAnimal",data:{animalId:r},dataType:"json",beforeSend:function(){e.prop("disabled",!0)},success:function(r){if(r.original){if(r.original.errors){var a="";jQuery.each(r.original.errors,function(e,r){a+=r+"<br>"}),(new Errors).showErrorModal(a)}}else if(r.errors)(new Errors).showErrorModal(r.errors.global);else{let r=window.location.pathname.split("/"),a=r[r.length-1];var n;n="animals"==a?"text-muted":"text-white",e.removeClass("notfavouriteAnimal").addClass("favouriteAnimal"),e.children().removeClass("pink-text").addClass(n)}},complete:function(){e.prop("disabled",!1)},error:function(e){}})}($(this))}),$(document).on("click",".favouriteShelter",function(){!function(e){let r=e.attr("data-shelter-id");$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({type:"POST",url:base_url+"/favouriteShelter",data:{shelterId:r},dataType:"json",beforeSend:function(){e.prop("disabled",!0)},success:function(r){if(r.original){if(r.original.errors){var a="";jQuery.each(r.original.errors,function(e,r){a+=r+"<br>"}),(new Errors).showErrorModal(a)}}else r.errors?(new Errors).showErrorModal(r.errors.global):(e.removeClass("favouriteShelter").addClass("notfavouriteShelter"),e.children().removeClass("text-white text-muted").addClass("pink-text"))},complete:function(){e.prop("disabled",!1)},error:function(e){}})}($(this))}),$(document).on("click",".notfavouriteShelter",function(){!function(e){let r=e.attr("data-shelter-id");$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({type:"POST",url:base_url+"/notFavouriteShelter",data:{shelterId:r},dataType:"json",beforeSend:function(){e.prop("disabled",!0)},success:function(r){if(r.original){if(r.original.errors){var a="";jQuery.each(r.original.errors,function(e,r){a+=r+"<br>"}),(new Errors).showErrorModal(a)}}else if(r.errors)(new Errors).showErrorModal(r.errors.global);else{let r=window.location.pathname.split("/"),a=r[r.length-1];var n;n="shelters"==a?"text-muted":"text-white",e.removeClass("notfavouriteShelter").addClass("favouriteShelter"),e.children().removeClass("pink-text").addClass(n)}},complete:function(){e.prop("disabled",!1)},error:function(e){}})}($(this))}),$(".button-collapse").sideNav();var e=document.querySelector(".custom-scrollbar");new PerfectScrollbar(e)});
