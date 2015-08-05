"use strict";

var App = window.App || {};

if (typeof App.FormFunctions === "undefined") {

	App.FormFunctions = {
        validateForm: {
            init: function(){

                $('form.validate_form').on('submit', function(e){
                    var form = $(this);
                        
                    
                    if (!App.FormFunctions.validateForm.runValidation(form)){
                        e.preventDefault();
                        $('html, body').animate({
                            scrollTop: $(".error:first").offset().top - 80
                        }, 400);
                    }else{
						form.find(':submit').attr('disabled','disabled');
                        if($('#payment_card_form').is(':visible')){
                            // createToken returns immediately - the supplied callback submits the form if there are no errors
                            Stripe.card.createToken({
                                number: $('.card-number').val(),
                                cvc: $('.card-cvc').val(),
                                exp_month: $('[name="card-expiry-month"]').val(),
                                exp_year: $('[name="card-expiry-year"]').val(),
                                //exp_year: $('.custom-select-box .card-expiry-year').find('.custom-select-label').text(),
                                //exp_month: $('.card-expiry-month .card-expiry-month').find('.card-expiry-month').text(),
                                name: $('.card-holder-name').val()
                            }, stripeResponseHandler);
                            return false; // submit from callback
                        }else{

                            return true;
                        }
                    }
                });

                $('body').on('input','input.error', function(){
                    App.FormFunctions.validateForm.runValidation($(this).parents('form'));
                });

                $('body').on('change','select.error, .error :checkbox', function(){
                    App.FormFunctions.validateForm.runValidation($(this).parents('form'));
                });
            },
            runValidation: function(form){

				var formValid = true;

                function isValidEmailAddress(emailAddress) {
                    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                    return pattern.test(emailAddress);
                };

                function isValidDate(date) {
                    var pattern = new RegExp(/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/);
                    var year = date.split('/').pop();
                    return pattern.test(date) && year < 2015;
                };

                form.find('input.required, select.required').each(function(){
                    if($(this).is(':visible')){
                        if ($(this).attr('type') == 'email'){
                            if (!isValidEmailAddress($(this).val())){
                                formValid = false;
                                if (!$(this).hasClass('error')){
                                    $(this).addClass('error').closest('label').append('<span class="field_error">Invalid email address</span>');
                                }
                            }else if ($(this).hasClass('error')){
                                $(this).removeClass('error').siblings('.field_error').remove();
                            }
                        }else if ($(this).hasClass('date_input')){
                            if (!isValidDate($(this).val())){
                                formValid = false;
                                if (!$(this).hasClass('error')){
                                    $(this).addClass('error').closest('label').append('<span class="field_error">Invalid email address</span>');
                                }
                            }else if ($(this).hasClass('error')){
                                $(this).removeClass('error').siblings('.field_error').remove();
                            }
                        }else{
                            if ($(this).val() == ''){
                                formValid = false;
                                var error_message = $(this).data('errormsg');
                                if (!$(this).hasClass('error')){
                                    $(this).addClass('error').closest('label').append('<span class="field_error">'+error_message+'</span>');
                                    if ($(this).is('select')){
                                        $(this).parents('.custom-select-box').addClass('error');
                                    }
                                }
                            }else if ($(this).hasClass('error')){
                                $(this).removeClass('error').siblings('.field_error').remove();
                                if ($(this).is('select')){
                                    $(this).parents('.custom-select-box').removeClass('error');
                                }
                            }
                        }
                    }
                });

                form.find('.checkbox_list.required').each(function(){
                    if ($(this).find(':checked').length == 0){
                        $(this).children('label.checkbox').addClass('error');
                        formValid = false;
                    }else{
                        $(this).children('label.checkbox.error').removeClass('error');
                    }
                });
                
                return formValid;
            }
        },
        calculatePrice: function(){
            $('select[name="modifier"]').change(function(){
                //console.log($(this).find(':selected').data('amount'));
                $('.price_group.hotel .price .number').text($(this).find(':selected').data('amount'));
                var totalPrice = parseInt($('.price_group.ticket .price .number').text()) + parseInt($(this).find(':selected').data('amount'));
                $('.price_group.total .price .number').text(totalPrice);

                if(totalPrice > 0){
                    $('#payment_card_form').show();
                    $('#submit_pay').show();
                    $('#submit_register').hide();
                }else{
                    $('#payment_card_form').hide();
                    $('#submit_pay').hide();
                    $('#submit_register').show();
                }
            });
        }
    };
    
    App.DocReady.add(function(){

	    App.FormFunctions.validateForm.init();
	    App.FormFunctions.calculatePrice();
	    
	    if ($('html').hasClass('lt-ie10')){
	        $('input, textarea').placeholder();
	    }
    });
}