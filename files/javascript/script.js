// *********************
// ***** FIRST IIFE ****
// *********************
//
(() => {

    // this is checking if browser has serviceWorker and instantiating it
    if( 'serviceWorker' in navigator ){

        window.addEventListener('load', () => {
            navigator.serviceWorker
                .register('serviceWorker.js')
                .then( () => {
                    console.log('[service Worker] Registered')
                })
                .catch(err => {
                    console.warn('[service Worker] failed to register', err)
                })
        })
    }

    // sending the first async ajax for faster data manipulation
    getConversionChartData()

})();

// *********************
// ******* EVENTS ******
// *********************
//
$(document).ready(function () {

	$('.odds-input').on('input', function( event ) {

	    // getting the typed input value and field id
	    const field_value = event.currentTarget.value
        const field_id    = event.currentTarget.id

        // mapping the field value to one from the database
        // returns undefined if not found
        const db_object = window.conversion_data.find((element)=>{
            return element[field_id] === field_value
        })

        //if the value was found in our database
        if(db_object !== undefined){

	        // because i need $() more than once , its faster to set them to const and then use them
            // instead of searching the DOM more times than needed (improves speed)
            const fractional = $(`#fractional_odds`)
            const decimal = $(`#decimal_odds`)
            const moneyline = $(`#moneyline_odds`)

            //fill in the rest of the fields
            fractional.val(db_object.fractional_odds)
            decimal.val(db_object.decimal_odds)
            moneyline.val(db_object.moneyline_odds)

            //animate all but current value field (calls animateThis for 2 fields)
            field_id === 'fractional_odds'  || animateThis(fractional)
            field_id === 'decimal_odds'     || animateThis(decimal)
            field_id === 'moneyline_odds'   || animateThis(moneyline)

            //logs the typed field id and value to the database
            logInput(field_value, field_id)
        }

	});

	//Modal init
    $('#exampleModal').on('show.bs.modal', function ( event ) {

        //find out what is the trigger button for the modal
        const recipient = $(event.relatedTarget).data('trigger')

        //the both tables are a bit different that's why this modifications are made
        if(recipient === 'smart'){
            $('.smartModal').show()
            $('.notSoSmartModal').hide()
            $('.classChange').css("top", "280px");

        } else if (recipient === 'not-so-smart') {
            $('.smartModal').hide()
            $('.notSoSmartModal').show()
            $('.classChange').css("top", "200px");
        }

        // this is the same as the initial iife
        // getting new data in case the user was long time on our page , and the data was changed
        getConversionChartData()
    })


    $('#any_odds').on('input', function( event ) {

        // getting the typed input value
        const field_value = event.currentTarget.value
        let property

        // find the correct field to search the db object
        if( event.currentTarget.value.includes('/') ){

            property = 'fractional_odds'

        } else if( event.currentTarget.value.includes('.') ){

            property = 'decimal_odds'

        } else if( event.currentTarget.value.includes('+')
                || event.currentTarget.value.includes('-') ){

            property = 'moneyline_odds'

        }

        // property is undefined by default when declaring new variable
        // this means that id none of the characters were found let property returns undefined by default
        if( property !== undefined ) {

            // mapping the field value to one from the database
            // returns undefined if not found
            const db_object = window.conversion_data.find((element) => {
                return element[property] === field_value
            })

            if( db_object !== undefined ){

                // because i need $() more than once , its faster to set them to const and then use them
                // instead of searching the DOM more times than needed (improves speed)
                const fractional = $(`#any_fractional_odds_placeholder`)
                const decimal = $(`#any_decimal_odds_placeholder`)
                const moneyline = $(`#any_moneyline_odds_placeholder`)

                //fill in the rest of the table
                fractional.text(db_object.fractional_odds)
                decimal.text(db_object.decimal_odds)
                moneyline.text(db_object.moneyline_odds)

                // animate the table where the data was loaded
                animateThis(fractional.parent())
                //logs the typed field id and value to the database
                logInput(field_value, 'any_odds')
            }
        }
    })

    // this notification is shown when there is no internet access, this event closes the notification
    $('.offline_btn').on('click', function() {
        document.querySelector('.offline_btn').classList.add("d-none")
    });

    // shows / hides legacy table
    $('#legacy_table_btn').on('click', function() {

        $('#legacy_table').toggle(300)

    });

    // this event is triggered when the browser gets offline
    window.addEventListener('offline', () => {

        //shows offline notification message
        document.querySelector('.offline_btn').classList.remove("d-none")
        animateThis($('.offline_btn'), 'animateOffline')
    });

});

// *********************
// ***** FUNCTIONS *****
// *********************

function getConversionChartData(){

    //async ajax to get the data
    $.ajax({
        url: 'api/conversion_chart.php',
        type: 'GET',
        dataType: 'json'
    })
        .done(function (data) {
            //write the data to the global scope
            window.conversion_data = data
            // refresh the tables with the new data
            refreshConversionChartTable()
        })
        .fail(function (data) {
            //show errors only when online
            //errors that are returned from the php
            !navigator.onLine || appendError(data.responseText)
        });
}

function logInput(field_value, field_id){

    //logging the user input to the database
	$.ajax({
		url: 'api/input_log.php',
		type: 'POST',
		dataType: 'json',
		data: {
            field_value : field_value,
            field_id: field_id
		}
	})
	.done(function(){
		console.log(' User input saved !!!');
	})
	.fail(function(){
		console.warn('Error while saving user input !!!');
	});

}

function refreshConversionChartTable(){

    let display_data_rows = ''

    //using for() because benchmarks show for is faster than .map
    for( let data_row of window.conversion_data){
        display_data_rows += `<tr>
                                <td>${data_row.fractional_odds}</td>
                                <td>${data_row.decimal_odds}</td>
                                <td>${data_row.moneyline_odds}</td>
                              </tr>`
    }

    $(`#odd_conversion_chart_table tbody`).html(display_data_rows)

}

//this function is so that animations can be re-triggered when needed
function animateThis(element, animation_class = 'animateThis'){

    element.removeClass(animation_class)

    setTimeout(()=>{
        element.addClass(animation_class)
    }, 100)
}

//show error for the user on the top of the page ( 404 / db errors etc...)
function appendError(message = 'There was an Error !!!') {

    $('body').prepend(
        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span>${message}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`
    )
}

