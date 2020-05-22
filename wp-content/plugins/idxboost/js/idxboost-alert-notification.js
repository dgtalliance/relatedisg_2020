//token_alert --- variable
var respon=[];
var notify_criteria;
var alert_event_click=false;
var url_params_alert = new URLSearchParams(window.location.search);
var type = url_params_alert.get('type');
var price = url_params_alert.get('price');
var beds = url_params_alert.get('beds');
var baths = url_params_alert.get('baths');
var size = url_params_alert.get('size');
var lot = url_params_alert.get('lot');
var built = url_params_alert.get('built');
var att = url_params_alert.get('att');
var rect = url_params_alert.get('rect');
var zm = url_params_alert.get('zm');
var token_alert = url_params_alert.get('token_alert');

setTimeout(function(){
   /*
     if(token_alert != "" && token_alert!= null ){
        
        if(jQuery('#ib-fsearch-save-modal').length >0 ) {
            jQuery("#ib-fsearch-save-modal").addClass("ib-md-active");
            //jQuery("#ib-fsearch-save-modal .ib-mghtitle").text("Update this search");
        }else{
            jQuery("#modal_edit_alert_information").addClass("active_modal");
        }         
        
        jQuery(".ib-btext").text("Update");
        idx_get_token_alert();
        console.log("sent to alert");
    }
    */

   if(token_alert != "" && token_alert!= null ){
  
    //jQuery("#ib-fsearch-save-modal").removeClass("ib-md-active");
    jQuery("#modal_edit_alert_information").addClass("active_modal");
    jQuery("#ib-fsearch-save-modal").hide();
    
    jQuery(".ib-btext").text("Update");
    idx_get_token_alert();
    console.log("sent to alert");
}


}, 1700);

function idx_get_token_alert(){
    
    jQuery.ajax({
        url: __flex_g_settings.ajaxUrl,
        method: "POST",
        data: {
            action: "flex_idx_get_alert_lead",
            token_alert: token_alert
        },
        dataType: "json",
        success: function(response) {

            if( response.hasOwnProperty('status') && response['status']){
                jQuery('.js-alert-subject').val(response['data']['search_name']);
                jQuery('.js-alert-event').val(response['data']['wp_user_period_alert']);               
                
                notify_criteria = JSON.parse(response['data']['notify_criteria']);
                console.log(notify_criteria);
                jQuery('.js-alert-status').each(function(){
                    var type_event=jQuery(this).attr('type_event');                    
                    
                    if(type_event=='status_changes'){
                        if( (typeof notify_criteria == 'object') && notify_criteria.hasOwnProperty('status_change') && notify_criteria['status_change'] ){
                                jQuery(this).prop('checked',true);
                        }else if(Array.isArray(notify_criteria) && notify_criteria.includes("status_change") ){
                            jQuery(this).prop('checked',true);
                        }
                    }

                    if(type_event=='new_listings') {
                        if( (typeof notify_criteria == 'object') && notify_criteria.hasOwnProperty('new_listing') && notify_criteria['new_listing'] ){
                            jQuery(this).prop('checked',true);
                        }else if(Array.isArray(notify_criteria) && notify_criteria.includes("new_listing") ){
                            jQuery(this).prop('checked',true);
                        }
                    }

                    if(type_event=='price_changes'){
                        if( (typeof notify_criteria == 'object') && notify_criteria.hasOwnProperty('price_change') && notify_criteria['price_change'] ){
                            jQuery(this).prop('checked',true);
                        }else if( Array.isArray(notify_criteria) && notify_criteria.includes("price_change") ){
                            jQuery(this).prop('checked',true);
                        }
                    }

                });
            }

        },complete: function() {

        }
      });    
}


jQuery(document).ready(function () {

    jQuery( ".js-form-alert-lead-update" ).submit(function( event ) {
        event.preventDefault();
        idx_save_token_alert();
    });

    jQuery( ".js-alert-update-preferences" ).click(function() {
        alert_event_click=true;
        if(token_alert != "" && token_alert!= null ){
            idx_save_token_alert();
        }
        
    });
    
});



function idx_save_token_alert(){
    var status_sent={status_change:false,new_listing:false,price_change:false};

    if ( jQuery('.js-alert-subject').val() != "" ) {
        jQuery('.js-alert-status').each(function(){
            var type_event=jQuery(this).attr('type_event');                    
                if(type_event=='status_changes')
                status_sent['status_change'] = jQuery(this).is(':checked');
    
                if(type_event=='new_listings')
                status_sent['new_listing'] = jQuery(this).is(':checked');
            
                if(type_event=='price_changes')
                    status_sent['price_change'] = jQuery(this).is(':checked');
        });    
        
        var IB_SEARCH_FILTER=jQuery('#flex_idx_search_filter');
        var search_url = encodeURIComponent(location.href);
        var search_count = IB_SEARCH_FILTER.attr("data-count");
        var search_condition = encodeURIComponent( IB_SEARCH_FILTER.attr("data-condition") );
        var search_filter_params = IB_SEARCH_FILTER.attr("data-params");
        var search_filter_ID = IB_SEARCH_FILTER.data("filter-id");

        jQuery.ajax({
            url: __flex_g_settings.ajaxUrl,
            method: "POST",
            data: {
                action: "alert_lead_update_preference",
                subject: jQuery('.js-alert-subject').val(),
                token_alert: jQuery('.token_alert_flo').val(),
                criterial_time: jQuery('.js-alert-event').val(),
                criterial_event: JSON.stringify(status_sent),                
                search_url: search_url,
                search_count: search_count,
                search_condition:search_condition,
                search_filter_params:search_filter_params,
                search_filter_ID:search_filter_ID                
            },
            dataType: "json",
            success: function(response) {
                if(alert_event_click == false){
                    sweetAlert('', 'Your preferences have been updated!', "success");
                }else{
                    sweetAlert('', 'Your saved filter has been updated!', "success");
                }
                
                jQuery("#modal_edit_alert_information").removeClass("active_modal");
            },complete: function() {
    
            }
          });    
    }else{
        sweetAlert(word_translate.oops, "You need fill in the subject", "error");
    }
}
