<?php

/**
 * Function: Mailchimp curl connect
 *
 * @param       $url
 * @param       $request_type
 * @param       $api_key
 * @param array $data
 *
 * @return mixed
 */
function mailchimp_curl_connect ($url, $request_type, $api_key, $data = array())
{
    if ($request_type == 'POST') {
        $url .= '?' . http_build_query($data);
    }

    $mch     = curl_init();
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode('user:' . $api_key),
    );
    curl_setopt($mch, CURLOPT_URL, $url);
    curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($mch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type);
    curl_setopt($mch, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false);

    if ($request_type != 'GET') {
        curl_setopt($mch, CURLOPT_POST, true);
        curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    return curl_exec($mch);
}

/**
 * Function: Sync Mailchimp
 *
 * @param $data
 *
 * @return mixed
 */
function syncMailchimp ($email)
{

    $api_key = 'xxxxxxxxxxxxxxxxxxx';
    $data1   = array(
        'fields' => 'lists',
        'count'  => 5,
    );

    $url       = 'https://us19.api.mailchimp.com/3.0/lists/';
    $results   = json_decode(mailchimp_curl_connect($url, 'GET', $api_key, $data1));
    $list_id_3 = $results->lists[2]->id;
    $url1 = $url.$list_id_3.'/members';
    $mch = curl_init();
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic '.base64_encode( 'user:'. $api_key)
    );

    $data_email = array(
        "email_address" => $email,
        "status" => "subscribed"
    );

    curl_setopt($mch, CURLOPT_URL, $url1 );
    curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
    curl_setopt($mch, CURLOPT_CUSTOMREQUEST, 'POST'); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
    curl_setopt($mch, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
    curl_setopt($mch, CURLOPT_POST, true);
    curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data_email) ); // send data in json
    $result=curl_exec($mch);
    curl_close($mch);

    return $result;
}

/**
 * Function: Add user in list
 */
function add_user_in_list (){
    $submit_add_user = $_POST['wp-submit'];
    $email = $_POST['user_login'];
    if ($submit_add_user) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            syncMailchimp($email);
        } else {
            echo "Invalid email";
        }
    }

}
add_action('retrieve_password_message', 'add_user_in_list');
