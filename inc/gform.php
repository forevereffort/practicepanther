<?php

add_filter('gform_confirmation', 'gform_start_free_trial_form_confirmation', 10, 4);

/**
 * Start Free Trial Form Type
 * when the user types his emails and clicks on the button it should send that email to a platform
 */
function gform_start_free_trial_form_confirmation($confirmation, $form, $entry)
{
    // Get current URL and URL parameters
    $url_object = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url_components = parse_url($url_object);
    parse_str($url_components['query'], $params);
    $current_url = "$url_components[scheme]://$url_components[host]$url_components[path]";

    // Cookies
    $ga_id = explode("GA1.1.", $_COOKIE['_ga'])[1];
    $ppmk = $_COOKIE['ppmk'];

    // By using form title, check this form is for start free trial form
    if (strpos(strtolower($form['title']), 'start free trial') !== false) {
        // After start free trial form is submitted successfully, send that email platform
        $body = [
            'Type' => 'PracticePanther',
            'GA_Campaign_Content__c' => $params['utm_content'],
            'GA_Campaign_Medium__c' => $params['utm_medium'],
            'GA_Campaign_Name__c' => $params['utm_campaign'],
            'GA_Campaign_Term__c' => $params['utm_term'],
            'GA_Landing_Page__c' => $current_url,
            'GA_Click_ID__c' => $params['gclid'],
            'GA_Gclid_c__c' => $params['gclid'],
            'GA_Client_Id__c' => $ga_id,
            'ppmk' => $ppmk,
        ];

        // Get email value
        foreach ($form['fields'] as $field) {
            $body['EMAIL'] = rgar($entry, $field->id);
        }

        // Send request
        $request = new WP_Http();
        $response = $request->post('https://app.practicepanther.com/SignUp', ['body' => $body]);
    }

    return $confirmation;
}
