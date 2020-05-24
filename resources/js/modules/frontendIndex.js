class frontendIndex {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.promotedAnimalsSlick();
        this.promotedSheltersSlick();
        this.getAnimalSpecies(base_url);
        this.counter();
        this.UX(base_url);
    }

    UX() {
        let self = this;


        $('#animalSpecies').on('change', function () {
            $('#searchAnimalsFrom').submit();
        });

    }

    promotedAnimalsSlick(){
        $('.promoted_animals').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
            ]
        });
    }

    promotedSheltersSlick(){
        $('.promoted_shelter').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            autoplay:false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
            ]
        });
    }

    counter(){
        (function ($){
            $.fn.counter = function() {
                const $this = $(this),
                    numberFrom = parseInt($this.attr('data-from')),
                    numberTo = parseInt($this.attr('data-to')),
                    delta = numberTo - numberFrom,
                    deltaPositive = delta > 0 ? 1 : 0,
                    time = parseInt($this.attr('data-time')),
                    changeTime = 10;

                let currentNumber = numberFrom,
                    value = delta*changeTime/time;
                var interval1;
                const changeNumber = () => {
                    currentNumber += value;
                    //checks if currentNumber reached numberTo
                    (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
                    this.text(parseInt(currentNumber));
                    currentNumber == numberTo ? clearInterval(interval1) : currentNumber;
                }

                interval1 = setInterval(changeNumber,changeTime);
            }
        }(jQuery));

        $(document).ready(function(){

            $('.count-up').counter();
            $('.count1').counter();
            $('.count2').counter();
            $('.count3').counter();

            new WOW().init();

            setTimeout(function () {
                $('.count5').counter();
            }, 3000);
        });
    }


    getAnimalSpecies(base_url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: base_url + "/getAnimalSpecies",
            data: {},
            dataType: 'json',
            success: function(data) {

                let animal_species = $('#animalSpecies');

                animal_species.children().remove();

                animal_species.append('<option value="" disabled selected>Znajdź...</option>');

                for (var i = 0; i<data.length; i++){
                    animal_species.append('<option value="'+ data[i]['id'] +'">'+ data[i]['name'] +'</option>');
                }

            },
            error: function(data) {
                alert(data);
            }
        });
    }
}
